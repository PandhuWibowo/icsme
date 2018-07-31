<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		// created the construct so that the helpers, libraries, models can be loaded all through this controller
		parent::__construct();
		$this->load->helper('url');
		// $this->load->library('xmlrpc');
		// $this->load->library('xmlrpcs');
		// $this->load->library('curl');
		// path to simple_html_dom 
        include APPPATH . 'third_party/simple_html_dom.php';
	}

	public function index()
	{
		redirect('manager/login');
		/*
			Kalau mau pakai Library Simple Html Dom - Start Package
		*/
		//Create object of Simple_html_dom class 
        // $html = new Simple_html_dom();
		/*
			End Package
		*/

		/** 
		 * Kalau mau pakai cURL - Start Package
		 * 
		*/
		// persiapkan curl
		// $url = "https://api.github.com/users/petanikode";
		// $ch = curl_init(); 

		// // set url 
		// curl_setopt($ch, CURLOPT_URL, $url);
		
		// // set user agent    
		// curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	
		// // return the transfer as a string 
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
		// // $output contains the output string 
		// $output = curl_exec($ch); 
	
		// // tutup curl 
		// curl_close($ch);      
		
		// json_encode($output, TRUE);
		
		// mengembalikan hasil curl
		// return $output;
		// $profile = json_decode($output, TRUE);
		// echo "<pre>";
		// print_r($profile);
		// echo "</pre>";
		// echo $profile['avatar_url'];
		/** 
		 * Kalau mau pakai cURL - End Package
		 * 
		*/
	}
	
	public function login(){
		$this->load->view('login');
	}
	
	public function logout(){
		@$this->session->unset_userdata($this->session->all_userdata());
	  	$this->session->sess_destroy($this->session->all_userdata());
		//$this->session->unset_userdata(array('login','profile','temp_data_diri','saved_data_diri','saved_data_peminjam','saved_data_pendana','temp_data_peminjam','temp_data_pendana','project_list','ajuan_dana','project_list_orderby','debug_data_project'));
		redirect('../');
	}
	
	public function _example_output($output = null)
	{
		$this->load->view('content.php',(array)$output);
	}	
	
	public function submit($form='',$id=''){
		if($form=='login'){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil=$this->mMaster->CekLogin($username,urldecode($password),'default','md5');
			if($hasil){
				$this->session->set_userdata('loginx',true);
				$this->session->set_userdata('login_datax',$hasil);
				@$this->config->set_item('syx_session_unique',$hasil->username);//custom session
				$result['hasil']=1;
				$result['message']='Login Correct!';
				$result['backurl']=site_url('manager/dashboard');
				//$this->WriteLog(current_url(),'login',$result->username);
			} else {
				$result['hasil']=0;
				$result['message']="Incorrect Username and Password!";
			}
		}
		if($form=='register'){
			$post=$this->input->post();
			$hasil=$this->mMaster->saveTable('data_member',$post);
			$result['hasil']=1;
			$result['message']='Data Saved!';
			$result['backurl']=site_url('../ticket');
			setcookie("user", $post['fullname'], time() + (86400 * 30), "/");
			setcookie("member_id", $hasil, time() + (86400 * 30), "/");
			setcookie("user_data", base64_encode(json_encode($post)),time() + (86400 * 30), "/");
			//$this->WriteLog(current_url(),'login',$result->username);
		}
		if($form=='cart'){
			if(isset($_COOKIE['member_id'])){
			$post=$this->input->post();
			$product=array('PRESENTER - Early Bird','PRESENTER - Regular','Observer / Non presenter');
			$price=array(250,300,250);
			$post['member_id']=$_COOKIE['member_id'];
			$post['order_number']='PO'.$post['member_id'].date('His');
			$total=0; $order='';
			for($i=1;$i<4;$i++){
				if($post['ticket_'.$i]!=''){
					$post['product']=$product[($i-1)];
					$post['quantity']=$post['ticket_'.$i];
					$post['price']=$price[($i-1)];
					$post['subtotal']=$post['price']*$post['quantity'];//$post['total_price'];
					$hasil=$this->mMaster->saveTable('data_payment',$post);
					$total+=$post['subtotal'];
					$order.='<li>Product : '.$post['product'].'<br/>Price : $ '.number_format($post['price']).'<br/>Quantity : '.$post['quantity'].'<br/>Subtotal : $ '.number_format($post['subtotal']).'</li>';
				}
			}
			$post['total_akhir'] = $total;
			setcookie("total", $total, time() + (86400 * 30), "/");
			setcookie("payment_data", base64_encode(json_encode($post)),time() + (86400 * 30), "/"); // Hairil
			if($this->config->item('send_mail')){
				$data_user=json_decode(base64_decode($_COOKIE['user_data']),true);
				$message='<h2>Hai, '.$_COOKIE['user'].'</h2>';
				$message.='Selamat! anda telah berhasil memesan tiket.<br/>';
				$message.='Nomor order anda <h3>#'.$post['order_number'].'</h3>.<br/>';
				$message.='Berikut detail pesanan anda :<br/>';
				$message.='<ul>';
				$message.=$order;
				$message.='</ul>';
				$message.='<br/><strong>Total : $ '.number_format($total).'</strong>';
				$message.='<p>Selanjutnya Silahkan anda transfer pembayaran ke nomor berikut ini :<br/>';
				$message.='Bank CIMB Niaga.<br/>No.Rek: <strong>800140073400</strong><br/>A/N : Indonesia Strategic Management Society</p>';
				$message.='<p>Jika anda telah membayar, silahkan konfirmasi pembayaran melalui link dibawah ini :<br/>';
				$message.='<a href="'.base_url('../confirm-payment/').'">Konfirmasi Pembayaran</a></p>';
				$message.='<p>
							Regards,
							</p>
							<p>
							<img src="'.site_url('../assets/uploads/logo_isms.png').'" class="CToWUd" height="80">
							<br />
							Indonesia Strategic Management Society
							</p>
							';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->from($this->config->item('sender_mail'), 'ICSME');
				$this->email->to($data_user['email']);
				$this->email->cc($this->config->item('cc_mail'));
				$this->email->bcc($this->config->item('bcc_mail'));
				$this->email->subject('[ICSME] - Pemesanan tiket anda telah berhasil');
				$this->email->message($message);
				$this->email->send();
			}
			
			$result['hasil']=1;
			$result['message']='Data successfully Saved!';
			$result['backurl']=site_url('../payment');
			} else {
				$result['hasil']=0;
				$result['message']='Unknown Customer. Please Register First!';
				$result['backurl']=site_url('../redirect');
			}
		}
		if($form=='confirmation'){
			$post=$this->input->post();
			
			if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){
				$this->load->library('upload');
				$config=array();
				$config['upload_path']   = './assets/uploads/files';
				$config['allowed_types'] = 'pdf|PDF|gif|jpeg|jpg|png';//|txt|doc|docx|xls|xlsx|gif|jpeg|jpg|png
				$config['max_size']      = 2000;
				$this->upload->initialize($config);
				//UPLOAD PHOTO
				if($this->upload->do_upload('file')){
					$data = $this->upload->data();
					$file_name = $data['raw_name'].$data['file_ext'];
					$result['hasil']=1;
					$result['filename']=$file_name;
					$result['message']='Berhasil diupload '.$file_name;
					//$this->db->set('file',$file_name)->where('id_item',$id_form_career)->update('company_profile_item');
					$post['payment_slip']=$file_name;
					$hasil=$this->mMaster->saveTable('data_confirmation',$post);
					$result['hasil']=1;
					$result['message']='Data successfully uploaded!';
					$result['backurl']=site_url('../');	
					echo '<script type="text/javascript">
						alert(\''.$result['message'].'\');
						window.location.href=\''.base_url('../').'\';
						</script>';
				} else {
					$error = array('error' => $this->upload->display_errors());
					$result['hasil']=0;
					$result['message']=$this->upload->display_errors();
					$result['backurl']=site_url('../confirm-payment');	
					echo '<script type="text/javascript">
						alert(\''.$result['message'].'\');
						window.location.href=\''.base_url('../confirm-payment').'\';
						</script>';
				}
			} else {
				$hasil=$this->mMaster->saveTable('data_confirmation',$post);
				$result['hasil']=1;
				$result['message']='Data successfully Sent!';
				$result['backurl']=site_url('../home');	
				echo '<script type="text/javascript">
					alert(\''.$result['message'].'\');
					window.location.href=\''.base_url('../').'\';
					</script>';
			}
		}
		echo json_encode($result);
	}
	
	public function dashboard(){
		if(!$this->session->userdata('loginx')) redirect('manager/logout');		
		try{
			$css_files=array();
			$js_files=array();
			$output = "<h1>Welcome ".$this->session->userdata('login_datax')->fullname."</h1>";

			$this->_example_output((object)array(
					'js_files' => $js_files,
					'css_files' => $css_files,
					'output'	=> $output
			));

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
	}
	
	public function customers()
	{
		if(!$this->session->userdata('loginx')) redirect('manager/logout');		
			$crud = new grocery_CRUD();

			$crud->set_table('data_member');
			$crud->set_theme('flexigrid');
			$crud->unset_add();
			$crud->unset_edit();
			//$crud->unset_operations();
			//$crud->set_relation('officeCode','offices','city');
			//$crud->display_as('officeCode','Office City');
			$crud->set_subject('Customers');
			$crud->order_by('input_date','desc');

			//$crud->required_fields('lastName');

			//$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	public function orders()
	{
		if(!$this->session->userdata('loginx')) redirect('manager/logout');		
			$crud = new grocery_CRUD();

			$crud->set_table('data_payment');
			$crud->set_theme('flexigrid');
			$crud->unset_add();
			$crud->unset_edit();
			//$crud->unset_operations();
			$crud->set_subject('data_payment');
			$crud->set_relation('member_id','data_member','fullname');
			$crud->order_by('input_date','desc');
 
			//$crud->required_fields('lastName');
			$crud->display_as('member_id','Customer');

			$output = $crud->render();

			$this->_example_output($output);
	}	
	public function confirmations()
	{
		if(!$this->session->userdata('loginx')) redirect('manager/logout');		
			$crud = new grocery_CRUD();

			$crud->set_table('data_confirmation');
			$crud->set_theme('flexigrid');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->order_by('input_date','desc');
			//$crud->unset_operations();
			$crud->set_subject('data_payment');
			$crud->callback_column('payment_slip',array($this,'_callback_link'));
			//$crud->required_fields('lastName');

			//$crud->set_field_upload('file_url','assets/uploads/files');

			//$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}	

	public function _callback_link($value, $row)
	{
		return "<a href='".base_url('assets/uploads/files/'.$value)."' target='_blank'>$value</a>";
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//DEVELOPED TO FRONT END & BACK END USE
class mMaster extends CI_Model {
	public function __construct()
    {
        parent::__construct();	
		//config
		$this->log_input=array( //format field log input
								'input_by',
								'input_date'
								);
		$this->log_update=array( //format field log update
								'update_by',
								'update_date'
								);
	}
	
	public function execQuery($query='',$connection='default'){
		$db=$this->load->database($connection,true);
		$database=$db->database;
		$result=$db->query($query);
		if(@$result) return $result->result();
		else return false;
	}
	
    public function getFieldTable($table='',$record=false){
		if($table){
			if(is_array($table)){
				$db=$this->load->database($table[0],true);
				$database=$db->database;
				$table=$table[1];
				$column_list=$db->query("SHOW COLUMNS FROM `{$database}`.`{$table}`")->result();
			} else {
				$db=$this->db;
				$column_list=$db->query("SHOW COLUMNS FROM `{$table}`")->result();
			}
			$db_field_types = array();
			foreach($column_list as $db_field_type)
			{
				$type = explode("(",$db_field_type->Type);
				$db_type = $type[0];
	
				if(isset($type[1]))
				{
					if(substr($type[1],-1) == ')')
					{
						$length = substr($type[1],0,-1);
					}
					else
					{
						list($length) = explode(" ",$type[1]);
						$length = substr($length,0,-1);
					}
				}
				else
				{
					$length = '';
				}
				$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
				$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
				$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
				$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
			}
	
			$results = $db->field_data($table);
			foreach($results as $num => $row)
			{
				$row = (array)$row;
				$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
			}
	
			return $results;
		}
    }
	
	public function saveTable($table='',$arr,$withlog=0,$record=false){//DATABASE CURRENT
		if(!$record) $field=$this->getFieldTable($table);
		if(is_array($table)){
			$db=$this->load->database($table[0],true);
			$table=$table[1];
		} else $db=$this->db;
		
		if(!$record){
			$fieldne=array(); 
			foreach($field as $f){
				$fieldne[]=$f->name;
			}
		} else {
			$query="INSERT INTO $table ";
			$fieldx=array(); $valuex=array();
		}
		foreach($arr as $key=>$value){
			if(!$record){
				if(in_array($key,$fieldne)){
					$db->set($key,$value);
				}
			} else {
				$fieldx[]='`'.$key.'`';
				$valuex[]="'".print_r($value,true)."'";
			}
		}
		if($withlog){
			if($record){
				$fieldx[]=$this->log_input[0];
				$valuex[]="'".$this->id_user."'";
				$fieldx[]=$this->log_input[1];
				$valuex[]="'".date('Y-m-d H:i:s')."'";
			} else {
				$db->set($this->log_input[0],$this->id_user);
				$db->set($this->log_input[1],date('Y-m-d H:i:s'));
			}
		}
		if($record) $query.="(".implode(',',$fieldx).") VALUES (".implode(',',$valuex).")";
		if($record){ return $query; }
		else {
			$hasil=$db->insert($table);
			$idx=$db->insert_id();
			if($hasil && $idx) return $idx;//return $db->last_query();
			else return $hasil;
		}
	}

	public function updateTable($table='',$arr,$arrclause,$withlog=0,$record=false){ //DATABASE CURRENT
		if(!$record) $field=$this->getFieldTable($table);
		if(is_array($table)){
			$db=$this->load->database($table[0],true);
			$table=$table[1];
		} else $db=$this->db;
		
		if(!$record){
			$fieldne=array();
			$exceptfield=array();
			foreach($field as $f){
				$fieldne[]=$f->name;
			}
		} else {
			$query='UPDATE '.$table.' SET ';
			$temp=array();
		}
		
		foreach($arrclause as $c=>$val){
			$exceptfield[]=$c;
		}

		foreach($arr as $field=>$content){
			if(!$record){
				if(in_array($field,$fieldne)){
					if(!in_array($field,$exceptfield)){
						$db->set($field,$content);
					}
				}
			} else {
				if(!in_array($field,$exceptfield)){
					$temp[]="`$field`='$content'";
				}
			}
		}
			
		if($withlog){
			if($record) { 
				$temp[]="`".$this->log_update[0]."`='".$this->id_user."'";
				$temp[]="`".$this->log_update[1]."`='".date('Y-m-d H:i:s')."'";
			} else {
				$db->set($this->log_update[0],$this->id_user);
				$db->set($this->log_update[1],date('Y-m-d H:i:s'));
			}
		}
		if($record) $query.=implode(',',$temp);
		if($arrclause){
			if(@$arrclause['syxtipe']=='OR'){
				$tampung=array();$fieldne='';
				foreach($arrclause as $field=>$value){
					if($field!='syxtipe') {
						$tampung[]=$value;
						$fieldne=$field; //field kudu sama value berbeda
					}
				}
				if($record) $query.=' WHERE '.$fieldne.' IN ('.implode(',',$tampung).')';
				else $db->where_in($fieldne,$tampung);
			} else {
				$temp=array();
				foreach($arrclause as $field=>$value){
					if($field!='syxtipe') {
						if($record) $temp[]="`$field` = '$value'";
						else $db->where($field,$value);
					}
				}
				if($record) $query.=' WHERE '.implode(',',$temp);
			}
		}
		//return $fieldne;
		if($record) return $query;
		else {
			$hasil=$db->update($table);
			return $hasil;
		}
	}
	
	public function CekLogin($username='',$password='',$connection='',$typecrypt='sha1'){//typecrypt='md5','docrypt','
		if($username && $password){
			if($typecrypt=='md5') $password=md5($password);//$this->encrypt->encode($password, $key);
			elseif($typecrypt='sha1') $password=sha1($password);
			elseif($typecrypt=='docrypt') {
				$this->load->library('crypto');
				$password=$this->crypto->do_crypt($password);
			}
			$result=$this->execQuery("select * from master_user where username='$username' and password = '$password' limit 1");
			if($result){
				return $result[0];
			}
		}
		return false;
	}

	function send_mail($arrdata){
		$subject=isset($arrdata['subject'])?$arrdata['subject']:'[INFO] - Information';
		$sender=isset($arrdata['sender'])?$arrdata['sender']:'info@webgopek.com';
		$sender_name=isset($arrdata['sender_name'])?$arrdata['sender_name']:'WEB SERVICE';
		$destination=isset($arrdata['destination'])?$arrdata['destination']:'djono@webgopek.com';
		$replyto=isset($arrdata['replyto'])?$arrdata['replyto']:'admin@webgopek.com';
		$message=isset($arrdata['message'])?$arrdata['message']:'';
		$cc=isset($arrdata['cc'])?$arrdata['cc']:'';
		$bcc=isset($arrdata['bcc'])?$arrdata['bcc']:'';
		//$config['protocol'] = 'smtp';
		//$config['smtp_host']='smtp.centrin.net.id';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($sender,$sender_name);
		$this->email->to($destination);
		$this->email->cc($cc);
		$this->email->bcc($bcc);
		$this->email->subject($subject);
		$this->email->message($message); 
		$yess=@$this->email->send();
	}
	
}
?>
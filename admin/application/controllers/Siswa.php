<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Siswa extends REST_Controller { 

// GET public function index_get(){ $data_siswa = array( "output" : "hellow world" ); $this->response($data_siswa, 500);
	public function index_get(){

		header("Access-Control-Allow-Origin");

		// $sql = $this->db->query("SELECT * FROM data_member")->result();
		// // $data_siswa = array(
		// // 	"nama" => "Pandhu Wibowo",
		// // 	"umur" => "21"
		// // );

		// $this->response($sql, 200);

		$id = $this->get('member_id');
        if ($id == '') {
            $kontak = $this->db->get('data_member')->result();
        } else {
            $this->db->where('member_id', $id);
            $kontak = $this->db->get('data_member')->result();
        }
        $this->response($kontak, 200);
	}

}

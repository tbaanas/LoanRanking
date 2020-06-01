<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('admin/addCamp', array('error' => ' ' ));
	}

	public function upload()
	{
		$config['upload_path']          = './uploads/img/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name']            = $this->randomFileName();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('admin/addCamp', $error);
		}
		else
		{//TODO tutaj do bazy model
			$e=$this->upload->data();
			$in = $e['file_name'];
			$data = array('upload_data' => $this->upload->data(),
			'test'=>$in
			);

			$this->load->view('admin/success', $data);
		}
	}

	function randomFileName($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
?>

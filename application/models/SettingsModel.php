<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model
{



	public function __construct()
	{
		parent::__construct();
	}

public function index(){

}



	public function getAllSettings()
	{

		$this->db->select('*');
		$this->db->from('settings');
	return $this->db->get()->result_array();

	}




	public function save(){
		$id=0;
		if($this->input->post('id')!=null)
		{
			$id=$this->input->post('id');
		}
		if($id!=0){
			$this->delete($id);
		}


		$data = array(
			'url' => $this->input->post('url'),
			'title' => $this->input->post('title'),
			'meta' => $this->input->post('meta'),
			'keyword'=>$this->input->post('keyword'),
			'tokenBL'=>$this->input->post('token'),
			'footer'=>$this->input->post('footer')

		);
		$this->db->insert('settings', $data);
	}


	private function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('settings');
	}


	public function getTokenBlue()
	{
		$this->db->select('tokenBL');
		$this->db->from('settings');
		return  $this->db->get()->row()->tokenBL;


	}
	public function getWebUrl(){

		$this->db->select('url');
		$this->db->from('settings');
		return  $this->db->get()->row()->url;
	}


	public function install(){

		$data = array(
			'url' => $this->input->post('url')
		);
		$this->db->insert('settings', $data);
	}

	public function contact(){
		$from_email = "kontakt@adsystem.org";
		$to_email = $this->input->post('email');
		//Load email library
		$this->load->library('email');
		$config = array (
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
		);
		$this->email->initialize($config);
		$this->email->from($from_email, 'Kontakt');
		$this->email->to($to_email);
		$this->email->subject('Kontakt Ratka');
		$this->email->message($this->input->post('text')."<br> imie i nazwisko:".$this->input->post('name'));
		//Send mail
		if($this->email->send())
			$this->session->set_flashdata("success","Wiadomość wysłana!");
		else
			$this->session->set_flashdata("error","Błąd podczas wysyłania wiadomości");
	}


}

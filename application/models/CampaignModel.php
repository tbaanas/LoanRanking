<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CampaignModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SettingsModel', 'settings');
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('campaign');

		return $this->db->get()->result();
	}

	public function getAllActive()
	{
		$this->db->select('*');
		$this->db->from('campaign');
		$this->db->where('active', 1);

		return $this->db->get()->result();
	}

	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('campaign');
		$this->db->where('id', $id);

		return $this->db->get()->result();
	}

	public function getOneLink($id)
	{
		$this->db->select('link');
		$this->db->from('campaign');
		$this->db->where('id', $id);

		return $this->db->get()->result();
	}

	public function update($id, $username, $email, $active)
	{
		$active2 = 0;
		$isAdmin2 = 0;


		if ($active == 'on') {
			$active2 = 1;
		}

		$this->db->set('username', $username);
		$this->db->set('email', $email);
		$this->db->set('active', $active);


		$this->db->where('id', $id);
		$this->db->update('campaign');
		redirect('panel/campaigns/edit/' . $id, 'refresh');

	}

	public function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('campaign');
		$this->session->set_flashdata('success', 'Usunięto!');
		redirect('panel/campaigns', 'refresh');
	}

	public function active($id)
	{

		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$this->db->update('campaign');
		$this->session->set_flashdata('success', 'Aktywowano!');
		redirect('panel/campaigns', 'refresh');
	}

	public function disable($id)
	{
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$this->db->update('campaign');
		$this->session->set_flashdata('success', 'Dezaktywowano!');
		redirect('panel/campaigns', 'refresh');
	}

	public function add()
	{
		if (isset($_POST['camp'])) {
			$this->addCampM();
			$this->session->set_flashdata('success', 'Dodano!');
			redirect('panel/campaigns', 'refresh');
		} else {
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/addCamp', array('error' => ' '));
			$this->load->view('admin/footer');
		}
	}


	public function getBlueLeadActions($token)
	{
		$campaign = array();
		$getPage = $this->getPage($token);
		if ($getPage == 'tokenFalse') {
			return "tokenFalse";
		}
		for ($k = 1; $k <= $getPage; $k++) {
			$data = $this->curlBl($token, $k);


			foreach ($data['results'] as $result) {

				if ($result['product_name'] == 'Szybka gotówka') {
					if(!empty($result['links'])){
					$campaign[] =
					$dataApp = array(

						'name' => $result['name'],
						//'description' => $result['description'],
						'links' =>$result['links'],
						'banners' => $result['banners'],
						'product_name' => $result['product_name']

					);};
				}

			}
		}


		return $campaign;

	}

	private function getPage($token)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://bluepartner.pl/api/partner_api/campaigns/');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Token ' . $token . '';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$data = json_decode($result, true);

		if (isset($data['detail']) && $data['detail'] == 'Niepoprawny token.') {
			return 'tokenFalse';
		} else
			if ($data['count'] >= 100) {
				return $data['count'] / 10;
				//return 25;
			} else

				return $data['count'];
		//return 25;

	}


	private function curlBl($token, $page)
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://bluepartner.pl/api/partner_api/campaigns/?page=' . $page);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Token ' . $token . '';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$data = json_decode($result, true);

		return $data;
	}


	public function getOneBL($id)
	{
		$token = $this->settings->getTokenBlue();

		$campaign = array();
		$getPage = $this->getPage($token);

		for ($k = 1; $k <= $getPage; $k++) {
			$result = $this->curlBl($token, $k);

			foreach ($result['results'] as $result) {
				if ($result['product_name'] == 'Szybka gotówka') {
					$campId = explode("=", $result["links"][0]["code"]);
					$idc = explode("\"", $campId[4]);
					if ($idc[0] == $id) {
						if (isset($result["banners"][1]["code"])) {
							$banner = explode("\"", $result["banners"][1]["code"]);

						} else {
							$banner = "";
						}
						$link = explode("\"", $result["links"][0]["code"]);


						$campaign[] =
						$dataApp = array(
							'name' => $result['name'],
							'description' => $result['description'],
							'links' => $link[1],
							'banners' => $banner[5],
							'product_name' => $result['product_name']

						);


					}
				}
			}


		}
		return $campaign;


	}

	public function updateCamp($id)
	{
		$config['upload_path'] = './uploads/img/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2048;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$config['file_name'] = $this->randomFileName();

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('userfile')) {

			$this->panel->editCamp($id, $this->input->post('linkImg'), $this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'), $this->input->post('bik'), $this->input->post('rate'), $this->input->post('commission'), $this->input->post('views'));
			$this->session->set_flashdata('success', 'Zaktualizowano!');

		} else {
			$e = $this->upload->data();

			$this->panel->editCamp($id, $e['file_name'], $this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'), $this->input->post('rate'), $this->input->post('commission'), $this->input->post('views'));
			$this->session->set_flashdata('success', 'Zaktualizowano!');

		}


	}

	private function randomFileName($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	private function addCampM()
	{
		$config['upload_path'] = './uploads/img/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2048;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$config['file_name'] = $this->randomFileName();

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('userfile')) {

			$this->panel->add($this->input->post('linkImg'), $this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'), $this->input->post('bik'));
			$this->session->set_flashdata('success', 'Zaktualizowano!');

		} else {
			$e = $this->upload->data();

			$this->panel->add($e['file_name'], $this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'));
			$this->session->set_flashdata('success', 'Zaktualizowano!');

		}


	}

	public function setView($id)
	{
		$this->db->select('views');
		$this->db->from('campaign');
		$this->db->where('id', $id);
		$getView = $this->db->get()->row();

		$this->db->set('views', $getView->views + 1);
		$this->db->where('id', $id);
		$this->db->update('campaign');
	}

}

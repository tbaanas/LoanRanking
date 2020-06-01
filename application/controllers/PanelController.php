<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('PanelModel', 'panel');
		$this->load->model('AdminModel', 'admin');
		$this->load->model('CampaignModel', 'camp');
		$this->load->model('SettingsModel', 'settings');

		if ($this->session->userdata('username') == null || $this->session->userdata('user_logged') == null) {
			redirect('admin/login', 'refresh');
		}


	}


	public function index()
	{

			$users = [
				'users' => $this->panel->getAll()];

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/index');
			$this->load->view('admin/footer');

	}


	public function users()
	{

			$id = $this->uri->segment(3);

			if ($id == 'add' || $id == 'edit' || $id == 'delete' || $id == 'active' || $id == 'disable') {
				$this->$id();
			} else {
				$users = [
					'users' => $this->panel->getAll()];
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/getAll', $users);
				$this->load->view('admin/footer');
			}


	}


	private function add()
	{



			if (isset($_POST['adu'])) {

				$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[50]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
				$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]');
				if ($this->form_validation->run() == TRUE) {
					$status = $this->admin->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'), $this->input->post('onoffswitch'), $this->input->post('isAdmin'));
					switch ($status) {
						case 'exists':
						{
							$this->session->set_flashdata('success', 'LOGIN ZAJĘTY!');

							redirect('panel/add', 'refresh');
							break;
						}
					}
					redirect('panel/add', 'refresh');
				}


			}
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addUser');
		$this->load->view('admin/footer');


	}


	private function edit()
	{

			$id = $this->uri->segment(4);

			$user = [
				'user' => $this->panel->getOne($id)];


			if (isset($_POST['edit'])) {

				$status = $this->panel->update($id, $this->input->post('username'), $this->input->post('password'), $this->input->post('email'), $this->input->post('onoffswitch'), $this->input->post('isAdmin'),$this->input->post('rate'),$this->input->post('commission'),$this->input->post('views'));
				switch ($status) {
					case 'ok':
					{
						$this->session->set_flashdata('success', 'Zaktualizowano!');

						redirect('panel/users/edit/' . $id, 'refresh');
						break;
					}
					case 'exists':
					{
						$this->session->set_flashdata('error', 'Login jest Zajęty!');

							redirect('panel/users/edit/' . $id, 'refresh');
						break;
					}
				}
				redirect('panel/users/edit/' . $id, 'refresh');


			}


			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/edit', $user);
			$this->load->view('admin/footer');


	}

	private function delete()
	{

			$id = $this->uri->segment(4);
			$status = $this->panel->delete($id);
			switch ($status) {
				case 'ok':
				{
					$this->session->set_flashdata('success', 'Usunięto!');

					redirect('panel/users', 'refresh');
					break;
				}
			}

	}

	private function active()
	{

			$id = $this->uri->segment(4);
			$status = $this->panel->active($id);
			switch ($status) {
				case 'ok':
				{
					$this->session->set_flashdata('success', 'Aktywowano!');

					redirect('panel/users', 'refresh');
					break;
				}
			}


	}

	private function disable()
	{

			$id = $this->uri->segment(4);
			$status = $this->panel->disable($id);
			switch ($status) {
				case 'ok':
				{
					$this->session->set_flashdata('success', 'Dezaktywowano!');

					redirect('panel/users', 'refresh');
					break;
				}
			}


	}


	public function campaigns()
	{

			$id = $this->uri->segment(3);
			if ($id == 'add' || $id == 'delete' || $id == 'active' || $id == 'disable') {
				if ($this->uri->segment(4) != null) {
					$this->camp->$id($this->uri->segment(4));
				} else
					$this->camp->$id();
			} else if ($id == 'edit') {
				$this->editCamp();
			} else {

				$camp = [
					'campaigns' => $this->camp->getAll()];
				$this->load->view('admin/header');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/getAllCamp', $camp);
				$this->load->view('admin/footer');


			}

	}


	private function upload()
	{

			$config['upload_path'] = './uploads/img/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 2048;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			$config['file_name'] = $this->randomFileName();

			$this->load->library('upload', $config);


			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('desc', 'Desc', 'required');
			$this->form_validation->set_rules('link', 'Link', 'required');
			if (empty($_FILES['userfile']['name'])) {
				//$this->form_validation->set_rules('userfile', 'Zdjęcie', 'required');

			}
			if ($this->form_validation->run() == TRUE) {


				if (!$this->upload->do_upload('userfile')) {

					$this->session->set_flashdata('error', 'Błąd!');
					redirect('panel/campaigns/add', 'refresh');
				} else {
					$e = $this->upload->data();

					$this->panel->addCamp($e['file_name'], $this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'));
					$this->session->set_flashdata('success', 'Dodano Kampanie!');
					redirect('panel/campaigns/add', 'refresh');
				}
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


	private function editCamp()
	{

			$id = $this->uri->segment(4);

			$campaign = ['campaign' => $this->camp->getOne($id)];


			if (isset($_POST['edit'])) {

				$this->camp->updateCamp($id);

				redirect('panel/campaigns/edit/' . $id, 'refresh');


			}


			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/editCamp', $campaign);
			$this->load->view('admin/footer');


	}


	public function blueLead()
	{
		$token =$this->settings->getTokenBlue();


		if ($this->uri->segment(3) == 'add') {
			$this->blAdd($this->uri->segment(4));
		} else {
			$isWork = $this->camp->getBlueLeadActions($token);
if($isWork=="tokenFalse"){
	$this->session->set_flashdata('error', 'Dodaj prawidłowy Token!');
	redirect('panel/settings', 'refresh');

}
			$blueActions = ['blueActions' => $this->camp->getBlueLeadActions($token)];

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/campTest', $blueActions);
			$this->load->view('admin/footer');
		}
	}


	private function blAdd($id)
	{

		if (isset($_POST['camp'])) {
			$this->panel->add($this->input->post('linkImg'),$this->input->post('name'), $this->input->post('desc'), $this->input->post('link'), $this->input->post('active'),$this->input->post('bik'),$this->input->post('rate'),$this->input->post('commission'),$this->input->post('views'));

			redirect('panel/campaigns', 'refresh');
		}

		else{


$test=['camp'=>$this->camp->getOneBL($id)];
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/bl/editCampBl',$test);
		$this->load->view('admin/footer');
		}
	}


	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_logged');
		$this->session->sess_destroy();

		redirect('admin/login', 'refresh');
	}



}

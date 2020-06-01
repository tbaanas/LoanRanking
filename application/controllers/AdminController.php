<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AdminModel', 'admin');

	}

	public function index()
	{
		if ($this->session->userdata('username') != null || $this->session->userdata('user_logged') != null) {
			redirect('panel', 'refresh');
		} else
			redirect('admin/login', 'refresh');
	}

	public function register()
	{
		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
			if ($this->form_validation->run() == TRUE) {
				$status = $this->admin->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'));
				switch ($status) {
					case 'exists':
					{
						$this->session->set_flashdata('success', 'LOGIN ZAJĘTY!');
						redirect('admin/register', 'refresh');
						break;
					}
				}
				redirect('admin/register', 'refresh');
			}
		}
		$this->load->view('register');
	}

	public function login()
	{
		if (isset($_POST['login'])) {
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
			if ($this->form_validation->run() == TRUE) {
				$result = $this->admin->login($this->input->post('username'), $this->input->post('password'));
				switch ($result) {
					case 'notExist':
					{
						$this->session->set_flashdata('success', 'Brak użytkownika o takim loginie!');
						redirect('admin/login', 'refresh');
						break;
					}
					case 'ok':{
						redirect('panel', 'refresh');
						break;
					}
				}

			}
		}
		$this->load->view('login');
	}


}

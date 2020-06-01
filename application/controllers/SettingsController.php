<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SettingsController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('SettingsModel', 'settings');
	}


	public function index()
	{
		if (isset($_POST['settings'])) {

			$this->settings->save();

			redirect('panel/settings', 'refresh');


		}
	$settings=['settings'=>$this->settings->getAllSettings()];

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/settings',$settings);
		$this->load->view('admin/footer');
	}



	public function getTokenBlue(){

		return $this->settings->getTokenBlue();
	}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		$this->load->model('CampaignModel','campaign');
		$this->load->model('SettingsModel', 'settings');
	}



	public function index()
	{
	/*	if($this->settings->getWebUrl()==null){

			if(isset($_POST['install'])){
				$this->settings->install();
			}
			$this->load->view('admin/header');
			$this->load->view('install');

		}else{*/

		$camp=['camp'=>$this->campaign->getAllActive()];
		$this->load->view('index',$camp);

	}


	public function contact()
	{
		if(isset($_POST['message'])){
			$this->settings->contact();
		}

		$this->load->view('contact');

	}

}

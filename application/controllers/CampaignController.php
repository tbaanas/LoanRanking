<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CampaignController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('CampaignModel','campaign');
	}

	public function index(){

if(!is_numeric($this->input->get('goto'))||!isset($_GET['goto'])){
	redirect('','refresh');
}
		$id = $this->input->get('goto');
		$link=$this->campaign->getOneLink($id);
		$this->campaign->setView($id);


		redirect($link[0]->link,'refresh');
	}


}

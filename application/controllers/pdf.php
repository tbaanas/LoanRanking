<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class pdf extends CI_Controller
{


	/**
	 * pdf constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Fpdf_gen','fpdf');
	}

	public function index()
	{

		$this->fpdf->SetFont('Arial', 'B', 30);
		$this->fpdf->cell(40, 10, 'My Pdf');
		echo $this->fpdf->output();

	}

}

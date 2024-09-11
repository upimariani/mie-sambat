<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/sidebar');
		$this->load->view('Supplier/vDashboard');
		$this->load->view('Supplier/Layouts/footer');
	}
}

/* End of file cDashboard.php */

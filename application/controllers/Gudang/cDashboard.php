<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/sidebar');
		$this->load->view('Gudang/vDashboard');
		$this->load->view('Gudang/Layouts/footer');
	}
}

/* End of file cDashboard.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->db->query("SELECT * FROM `pengguna` WHERE username='" . $username . "' AND password='" . $password . "'")->row();

			if ($login) {
				$id_pengguna = $login->id_pengguna;

				$array = array(
					'id_pengguna' => $id_pengguna
				);

				$this->session->set_userdata($array);

				$lev = $login->level_pengguna;
				if ($lev == '1') {
					redirect('Admin/cDashboard');
				} else if ($lev == '2') {
					redirect('Gudang/cDashboard');
				} else if ($lev == '3') {
					redirect('Supplier/cDashboard');
				} else {
					redirect('Pemilik/cDashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah! Coba Lagi!');
				redirect('cLogin');
			}
		}
	}
	public function logout()
	{
		$this->cart->destroy();
		$this->session->unset_userdata('id_pengguna');
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */

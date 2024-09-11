<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengguna extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pengguna' => $this->db->query("SELECT * FROM `pengguna`")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar');
		$this->load->view('Admin/Pengguna/vPengguna', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level Pengguna', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required|min_length[11]|max_length[13]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar');
			$this->load->view('Admin/Pengguna/vTambahPengguna');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_pengguna' => $this->input->post('level')
			);
			$this->db->insert('pengguna', $data);
			$this->session->set_flashdata('success', 'Data Pengguna berhasil disimpan!');
			redirect('Admin/cPengguna');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('level', 'Level Pengguna', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required|min_length[11]|max_length[13]');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'pengguna' => $this->db->query("SELECT * FROM `pengguna` WHERE id_pengguna='" . $id . "'")->row()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar');
			$this->load->view('Admin/Pengguna/vUpdatePengguna', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_pengguna' => $this->input->post('level')
			);
			$this->db->where('id_pengguna', $id);
			$this->db->update('pengguna', $data);

			$this->session->set_flashdata('success', 'Data Pengguna berhasil diperbaharui!');
			redirect('Admin/cPengguna');
		}
	}
	public function delete($id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->delete('pengguna');
		$this->session->set_flashdata('success', 'Data Pengguna berhasil dihapus!');
		redirect('Admin/cPengguna');
	}
}

/* End of file cPengguna.php */

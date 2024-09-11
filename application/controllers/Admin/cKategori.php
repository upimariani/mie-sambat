<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKategori extends CI_Controller
{

	public function index()
	{
		$data = array(
			'kategori' => $this->db->query("SELECT * FROM `kategori`")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar');
		$this->load->view('Admin/Kategori/vKategori', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar');
			$this->load->view('Admin/Kategori/vTambahKategori');
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama_kategori' => $this->input->post('nama')
			);
			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('success', 'Data kategori berhasil disimpan!');
			redirect('Admin/cKategori');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->db->query("SELECT * FROM `kategori` WHERE id_kategori='" . $id . "'")->row()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar');
			$this->load->view('Admin/Kategori/vUpdateKategori', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$data = array(
				'nama_kategori' => $this->input->post('nama')
			);
			$this->db->where('id_kategori', $id);
			$this->db->update('kategori', $data);
			$this->session->set_flashdata('success', 'Data kategori berhasil diperbaharui!');
			redirect('Admin/cKategori');
		}
	}
	public function delete($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
		$this->session->set_flashdata('success', 'Data Kategori berhasil dihapus');
		redirect('Admin/cKategori');
	}
}

/* End of file cKategori.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBaku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanBaku');
	}

	public function index()
	{
		$data = array(
			'bahanbaku' => $this->db->query("SELECT * FROM `barang`")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar');
		$this->load->view('Admin/BahanBaku/vBahanBaku', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('kategori', 'Kategori Bahan Baku', 'required');
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kategori' => $this->db->query("SELECT * FROM `kategori`")->result()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/sidebar');
			$this->load->view('Admin/BahanBaku/vTambahBB', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$config['upload_path']          = './asset/gambar';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'kategori' => $this->db->query("SELECT * FROM `kategori`")->result()
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/sidebar');
				$this->load->view('Admin/BahanBaku/vTambahBB', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {
				$upload_data = $this->upload->data();
				$data = array(
					'id_kategori' => $this->input->post('kategori'),
					'nama_barang' => $this->input->post('nama'),
					'keterangan' => $this->input->post('keterangan'),
					'harga_supplier' => $this->input->post('harga'),
					'stok_min' => '0',
					'eoq' => '0',
					'stok_gudang' => '0',
					'gambar' => $upload_data['file_name']
				);
				$this->db->insert('barang', $data);
				$this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Ditambahkan!');
				redirect('Admin/cBahanBaku');
			}
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('kategori', 'Kategori Bahan Baku', 'required');
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './asset/gambar';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 500000;

			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('gambar')) {

				$data = array(
					'kategori' => $this->db->query("SELECT * FROM `kategori`")->result(),
					'bb' => $this->mBahanBaku->edit($id)
				);
				$this->load->view('Admin/Layouts/head');
				$this->load->view('Admin/Layouts/sidebar');
				$this->load->view('Admin/BahanBaku/vUpdateBahanBaku', $data);
				$this->load->view('Admin/Layouts/footer');
			} else {

				$upload_data = $this->upload->data();
				$data = array(
					'id_kategori' => $this->input->post('kategori'),
					'nama_barang' => $this->input->post('nama'),
					'keterangan' => $this->input->post('keterangan'),
					'harga_supplier' => $this->input->post('harga'),
					'gambar' => $upload_data['file_name']
				);
				$this->db->where('id_barang', $id);
				$this->db->update('barang', $data);

				$this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Diperbaharui!');
				redirect('Admin/cBahanBaku');
			} //tanpa ganti gambar
			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga_supplier' => $this->input->post('harga'),

			);
			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);
			$this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Diperbaharui!');
			redirect('Admin/cBahanBaku');
		}
		$data = array(
			'kategori' => $this->db->query("SELECT * FROM `kategori`")->result(),
			'bb' => $this->mBahanBaku->edit($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/sidebar');
		$this->load->view('Admin/BahanBaku/vUpdateBahanBaku', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('barang');
		$this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
		redirect('Admin/cBahanBaku');
	}
}

/* End of file cBahanBaku.php */

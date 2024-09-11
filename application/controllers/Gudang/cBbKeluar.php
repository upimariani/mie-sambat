<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBbKeluar extends CI_Controller
{

	public function index()
	{
		$data = array(
			'bb_keluar' => $this->db->query("SELECT * FROM `barang_keluar`")->result(),
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/sidebar');
		$this->load->view('Gudang/vBbKeluar', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('bb', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('qty', 'Quantity Bahan Baku', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bb' => $this->db->query("SELECT * FROM `barang`")->result()
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/sidebar');
			$this->load->view('Gudang/vTambahBbKeluar', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			$data = array(
				'id' => $this->input->post('bb'),
				'name' => $this->input->post('nama'),
				'price' => $this->input->post('harga'),
				'qty' => $this->input->post('qty'),
				'stok' => $this->input->post('stok')
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Bahan Baku berhasil ditambahkan!');
			redirect('Gudang/cBbKeluar/create');
		}
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Gudang/cBbKeluar/create');
	}
	public function add()
	{
		$dt = array(
			'tgl_keluar' => date('Y-m-d'),
			'total_bayar' => $this->cart->total()
		);
		$this->db->insert('barang_keluar', $dt);

		$id_bkeluar = $this->db->query("SELECT MAX(id_bkeluar) as id FROM `barang_keluar`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$dt_detail = array(
				'id_bkeluar' => $id_bkeluar->id,
				'id_barang' => $value['id'],
				'jumlah' => $value['qty']
			);
			$this->db->insert('dbarang_keluar', $dt_detail);

			//memperbaharui data stok gudang
			$stok = array(
				'stok_gudang' => $value['stok'] - $value['qty']
			);
			$this->db->where('id_barang', $value['id']);
			$this->db->update('barang', $stok);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data Bahan Baku berhasil disimpan!');
		redirect('Gudang/cBbKeluar');
	}
	public function hapus($id)
	{
		$this->db->where('id_bkeluar', $id);
		$this->db->delete('barang_keluar');

		$this->db->where('id_bkeluar', $id);
		$this->db->delete('dbarang_keluar');
		$this->session->set_flashdata('success', 'Data Bahan Baku Keluar berhasil dihapus!');
		redirect('Gudang/cBbKeluar');
	}
}

/* End of file cBbKeluar.php */

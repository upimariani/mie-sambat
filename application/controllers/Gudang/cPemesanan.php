<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna")->result()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/sidebar');
		$this->load->view('Gudang/vPemesanan', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');

		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna")->result(),
				'bb' => $this->db->query("SELECT * FROM `barang`")->result()
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/sidebar');
			$this->load->view('Gudang/vTambahPemesanan', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			$data = array(
				'id' => $this->input->post('nama'),
				'name' => $this->input->post('namabb'),
				'price' => $this->input->post('harga'),
				'qty' => $this->input->post('qty')
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Bahan Baku berhasil dimasukkan kedalam keranjang!');
			redirect('Gudang/cPemesanan/create');
		}
	}
	public function pesan()
	{
		$data = array(
			'id_pengguna' => $this->input->post('supplier'),
			'tgl' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'stat_pembayaran' => '0',
			'bukti_bayar' => '0',
			'stat_transaksi' => '1'
		);
		$this->db->insert('transaksi', $data);

		//menyimpan data detail transaksi
		$id_transaksi = $this->db->query("SELECT MAX(id_transaksi) as id FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$dt_detail = array(
				'id_transaksi' => $id_transaksi->id,
				'id_barang' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_transaksi', $dt_detail);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data pemesanan berhasil disimpan!');
		redirect('Gudang/cPemesanan');
	}
	// public function bayar($id)
	// {
	// 	$config['upload_path']          = './asset/bayar';
	// 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 	$config['max_size']             = 500000;

	// 	$this->load->library('upload', $config);


	// 	if (!$this->upload->do_upload('bayar')) {

	// 		$data = array(
	// 			'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna")->result()
	// 		);
	// 		$this->load->view('Gudang/Layouts/head');
	// 		$this->load->view('Gudang/Layouts/sidebar');
	// 		$this->load->view('Gudang/vPemesanan', $data);
	// 		$this->load->view('Gudang/Layouts/footer');
	// 	} else {

	// 		$upload_data = $this->upload->data();
	// 		$data = array(
	// 			'stat_pembayaran' => '1',
	// 			'stat_transaksi' => '3',
	// 			'bukti_bayar' => $upload_data['file_name']
	// 		);
	// 		$this->db->where('id_transaksi', $id);
	// 		$this->db->update('transaksi', $data);

	// 		$this->session->set_flashdata('success', 'Pembayaran berhasil dikirim!');
	// 		redirect('Gudang/cPemesanan');
	// 	}
	// }
	public function diterima($id)
	{
		$config['upload_path']          = './asset/bayar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('bayar')) {

			$data = array(
				'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna")->result()
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/sidebar');
			$this->load->view('Gudang/vPemesanan', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			//memperbaharui data stok di gudang
			$data_transaksi = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $id . "'")->result();
			foreach ($data_transaksi as $key => $value) {
				$stok = array(
					'stok_gudang' => $value->qty + $value->stok_gudang
				);
				$this->db->where('id_barang', $value->id_barang);
				$this->db->update('barang', $stok);
			}

			//memperbaharui status transaksi -> selesai
			$upload_data = $this->upload->data();
			$data = array(
				'stat_pembayaran' => '1',
				'stat_transaksi' => '3',
				'bukti_bayar' => $upload_data['file_name']
			);
			$this->db->where('id_transaksi', $id);
			$this->db->update('transaksi', $data);

			$this->session->set_flashdata('success', 'Pesanan berhasil diterima!');
			redirect('Gudang/cPemesanan');
		}
	}
}

/* End of file cPemesanan.php */

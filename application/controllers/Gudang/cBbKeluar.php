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

			// notif wa 
			$token = "VXAFPXwtC7eGDY4yJTbk";
			$target = '085156727368';
			// $remark = $this->input->post('remark');
			// $nama_barang = $this->input->post('nama_barang');
			// $stock = $this->input->post('stock');

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.fonnte.com/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array(
					'target' => $target,
					'message' => "Hallo Pemilik Toko Mie Sambat. berikut ini adalah informasi terkait stock barang digudang: 
					
					" . "nama_barang : " . 1 . " 
					stock : " . 1 . "
					
					
					Terimakasih. ",
				),
				CURLOPT_HTTPHEADER => array(
					"Authorization: $token"
				),
			));

			$response = curl_exec($curl);
			if (curl_errno($curl)) {
				$error_msg = curl_error($curl);
			}
			curl_close($curl);

			if (isset($error_msg)) {
				echo $error_msg;
			}
			echo $response;
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

	// kirim notif wa
	public function send()
	{

		$no_hp = '085156727368';
		$remark = 'Coba test';

		$result = file_get_contents("http://localhost:5000/" . "msg?number=" . $no_hp . "&message=" . $remark);
		$this->session->set_flashdata('pesan', 'Berhasil Dikirim');
	}
}

/* End of file cBbKeluar.php */

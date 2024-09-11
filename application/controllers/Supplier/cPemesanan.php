<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna WHERE transaksi.id_pengguna='" . $this->session->userdata('id_pengguna') . "'")->result()
		);
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/sidebar');
		$this->load->view('Supplier/vPemesanan', $data);
		$this->load->view('Supplier/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_transaksi' => '2'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil dikonfirmasi!');
		redirect('Supplier/cPemesanan');
	}
}

/* End of file cPemesanan.php */

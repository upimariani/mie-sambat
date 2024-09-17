<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function index()
	{
		$data = array(
			'bahan_baku' => $this->db->query("SELECT * FROM `barang`")->result()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/sidebar');
		$this->load->view('Gudang/Analisis/vAnalisis', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function view($id_barang)
	{
		$data = array(
			'id_barang' => $id_barang,
			'dt_view' => $this->db->query("SELECT * FROM `analisis` JOIN barang ON analisis.id_barang=barang.id_barang WHERE barang.id_barang='" . $id_barang . "'")->result()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/sidebar');
		$this->load->view('Gudang/Analisis/vView', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function hitung($id_barang)
	{
		echo 'Bismillah perhitungan<br>';

		//variabel
		$periode = $this->input->post('periode');
		$biaya_pemesanan = $this->input->post('biaya_pemesanan');
		$biaya_penyimpanan = $this->input->post('biaya_penyimpanan');
		$lead_time = $this->input->post('lead_time');
		$hari_aktif = $this->input->post('hari_aktif');

		//mencari jumlah pemesanan dalam satu bulan
		$dt_pemesanan = $this->db->query("SELECT SUM(qty) as jml_pemesanan, MONTH(tgl) as bulan, YEAR(tgl) as tahun, COUNT(transaksi.id_transaksi) as frequensi FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE barang.id_barang='" . $id_barang . "' AND MONTH(tgl)='" . $periode . "'")->row();

		$jml_pemesanan = $dt_pemesanan->jml_pemesanan;
		$frequensi = $dt_pemesanan->frequensi;

		//mencari biaya pemesanan
		$bpemesanan = round($biaya_pemesanan / $frequensi);

		//mencari biaya penyimpanan
		$bpenyimpanan = round($biaya_penyimpanan / $jml_pemesanan);

		//masuk rumus EOQ
		$eoq = round(sqrt((2 * $jml_pemesanan * $bpemesanan) / $bpenyimpanan));

		$frq = round($jml_pemesanan / $eoq);

		// echo 'Jumlah Pemesanan Bahan Baku :' . $jml_pemesanan;
		// echo '<br>Frequensi Pemesanan :' . $frequensi;
		// echo '<br> Biaya Pemesanan per Bulan :' . $biaya_pemesanan;
		// echo '<br> Biaya Penyimpanan per Bulan :' . $biaya_penyimpanan;

		// echo '<hr><br>Biaya Pemesanan :' . $bpemesanan;
		// echo '<br>Biaya Penyimpanan :' . $bpenyimpanan;
		// echo '<br>Hasil EOQ :' . $eoq;
		// echo '<br>Frequensi yang ekonomis : ' . $frq . ' kali';

		//-----------------------------------
		//perhitungan ROP

		$rop = round(($jml_pemesanan / $hari_aktif) * $lead_time);
		// echo '<br> Hasil ROP:' . $rop;

		$data = array(
			'id_barang' => $id_barang,
			'periode' => $dt_pemesanan->bulan,
			'tahun' => $dt_pemesanan->tahun,
			'eoq' => $eoq,
			'rop' => $rop,
			'total_kebutuhan' => $jml_pemesanan,
			'frequensi' => $frq
		);
		$this->db->insert('analisis', $data);

		//memperaharui data barang terbaru
		$dt_barang = array(
			'stok_min' => $rop,
			'eoq_in' => $eoq
		);
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $dt_barang);
		$this->session->set_flashdata('success', 'Analisis Bahan Baku periode ' . $dt_pemesanan->bulan . ' Tahun ' . $dt_pemesanan->tahun . ' berhasil disimpan!');
		redirect('Gudang/cAnalisis/view/' . $id_barang);
	}
	public function delete($id)
	{
		$this->db->where('id_analisis', $id);
		$this->db->delete('analisis');
		$this->session->set_flashdata('success', 'Analisis Bahan Baku berhasil dihapus!');
		redirect('Gudang/cAnalisis');
	}
}

/* End of file cAnalisis.php */

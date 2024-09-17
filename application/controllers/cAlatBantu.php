<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAlatBantu extends CI_Controller
{

	public function index()
	{
		$dt_transaksi = $this->db->query("SELECT * FROM `transaksi`")->result();
		foreach ($dt_transaksi as $key => $value) {
			$total = 0;
			$dt_detail = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $value->id_transaksi . "'")->result();
			foreach ($dt_detail as $key => $a) {
				$total += ($a->qty * $a->harga_supplier);
			}
			$data = array(
				'total_bayar' => $total
			);
			$this->db->where('id_transaksi', $value->id_transaksi);
			$this->db->update('transaksi', $data);
		}
	}
	public function coba()
	{
		$date = date('m') - 1;
		echo $date;
		$dt = $this->db->query("SELECT * FROM `transaksi` WHERE MONTH(tgl) >= '" . $date . "'");
		echo $this->db->last_query();
		die();
	}
}

/* End of file cAlatBantu.php */

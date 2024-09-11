<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanBaku extends CI_Model
{
	public function edit($id)
	{
		return $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $id . "'")->row();
	}
}

/* End of file mBahanBaku.php */

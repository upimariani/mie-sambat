<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pemesanan' => $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON pengguna.id_pengguna=transaksi.id_pengguna")->result()
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/sidebar');
		$this->load->view('Pemilik/vPemesanan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function pemesanan()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		// $pdf->Image('asset/logosmp.png', 3, 3, 40);
		$pdf->Cell(200, 5, 'MIE SAMBAT', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Ciawigebang - Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN PEMESANAN BAHAN BAKU', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Nama Supplier', 1, 0, 'C');
		$pdf->Cell(80, 7, 'Total Pembayaran', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dt = $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON transaksi.id_pengguna=pengguna.id_pengguna WHERE stat_transaksi='3' AND MONTH(tgl)='" . $bulan . "' AND YEAR(tgl)='" . $tahun . "'")->result();
		foreach ($dt as $key => $value) {
			$tot += $value->total_bayar;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->tgl, 1, 0, 'C');
			$pdf->Cell(50, 7, $value->nama, 1, 0, 'C');
			$pdf->Cell(80, 7, 'Rp.' . number_format($value->total_bayar), 1, 1, 'R');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(185, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Ciawigebang, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Mie Sambat', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
	public function analisis()
	{
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/sidebar');
		$this->load->view('Pemilik/vLapAnalisis');
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function lap_analisis()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		// $pdf->Image('asset/logosmp.png', 3, 3, 40);
		$pdf->Cell(200, 5, 'MIE SAMBAT', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Ciawigebang - Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN HASIL ANALISIS METODE EOQ DAN ROP', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Periode', 1, 0, 'C');
		$pdf->Cell(50, 7, 'Total Kebutuhan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'EOQ', 1, 0, 'C');
		$pdf->Cell(30, 7, 'ROP', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Frequensi', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$bb = $this->input->post('bb');
		$dt = $this->db->query("SELECT * FROM `analisis` JOIN barang ON barang.id_barang=analisis.id_barang WHERE barang.id_barang='" . $bb . "'")->result();
		foreach ($dt as $key => $value) {
			if ($value->periode == '1') {
				$bulan = 'Januari';
			} else if ($value->periode == '2') {
				$bulan = 'Februari';
			} else if ($value->periode == '3') {
				$bulan = 'Maret';
			} else if ($value->periode == '4') {
				$bulan = 'April';
			} else if ($value->periode == '5') {
				$bulan = 'Mei';
			} else if ($value->periode == '6') {
				$bulan = 'Juni';
			} else if ($value->periode == '7') {
				$bulan = 'Juli';
			} else if ($value->periode == '8') {
				$bulan = 'Agustus';
			} else if ($value->periode == '9') {
				$bulan = 'September';
			} else if ($value->periode == '10') {
				$bulan = 'Oktober';
			} else if ($value->periode == '11') {
				$bulan = 'November';
			} else if ($value->periode == '12') {
				$bulan = 'Desember';
			}
			$tot += $value->total_kebutuhan;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $bulan . ' ' . $value->tahun, 1, 0, 'C');
			$pdf->Cell(50, 7, number_format($value->total_kebutuhan), 1, 0, 'R');
			$pdf->Cell(30, 7, $value->eoq, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->rop, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->frequensi, 1, 1, 'C');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(190, 7, 'Jumlah Kebutuhan: ' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Ciawigebang, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Mie Sambat', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cLaporan.php */

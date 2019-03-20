<?php 
	require('../fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Daftar Data Pengembalian Di Perpustakaan',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(20,6,'Time'.date(' d F Y'),0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'Nama',1,0);
$pdf->Cell(30,6,'Buku',1,0);
$pdf->Cell(25,6,'Tgl Pinjam',1,0);
$pdf->Cell(28,6,'Tgl Jth Tempo',1,0);
$pdf->Cell(25,6,'Tgl Kembali',1,0);
$pdf->Cell(16,6,'Telat',1,0);
$pdf->Cell(20,6,'Denda',1,1);
$connect = mysqli_connect("localhost","root","","project-perpustakaan");
$pdf->SetFont('Arial','',10);
$query = mysqli_query($connect,"SELECT buku.jd_buku,anggota.nama,peminjam.tgl_pinjam,peminjam.jth_tempo,pengembalian.id_pengembalian,pengembalian.tgl_kembali,pengembalian.telat,pengembalian.denda FROM pengembalian join anggota on pengembalian.nis = anggota.nis join peminjam on pengembalian.id_peminjam = peminjam.id_peminjam join buku on pengembalian.kd_buku = buku.kd_buku");
$no =1;
while ($row = mysqli_fetch_array($query)){
	$pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(30,6,$row['nama'],1,0);
    $pdf->Cell(30,6,$row['jd_buku'],1,0);
    $pdf->Cell(25,6,$row['tgl_pinjam'],1,0);
    $pdf->Cell(28,6,$row['jth_tempo'],1,0);
    $pdf->Cell(25,6,$row['tgl_kembali'],1,0);
    $pdf->Cell(16,6,$row['telat'],1,0);
    $pdf->Cell(20,6,$row['denda'],1,1);
}

$pdf->Output();
?>
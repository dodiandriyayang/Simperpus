<?php 
	require('../fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Daftar Data Anggota Di Perpustakaan',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(20,6,'Time'.date(' d F Y'),0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Nis',1,0);
$pdf->Cell(40,6,'Nama',1,0);
$pdf->Cell(30,6,'Kelas',1,0);
$pdf->Cell(30,6,'Jurusan',1,0);
$pdf->Cell(30,6,'Jenkel',1,0);
$pdf->Cell(25,6,'Alamat',1,1);
$connect = mysqli_connect("localhost","root","","project-perpustakaan");
$pdf->SetFont('Arial','',10);
$query = mysqli_query($connect, "SELECT * FROM anggota");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(20,6,$row['nis'],1,0);
    $pdf->Cell(40,6,$row['nama'],1,0);
    $pdf->Cell(30,6,$row['kelas'],1,0);
    $pdf->Cell(30,6,$row['jurusan'],1,0);
    $pdf->Cell(30,6,$row['jenkel'],1,0);
    $pdf->Cell(25,6,$row['alamat'],1,1);
}

$pdf->Output();
?>
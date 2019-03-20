<?php 
	require('../fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Daftar Data Buku Di Perpustakaan',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(20,6,'Time'.date(' d F Y'),0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'No buku',1,0);
$pdf->Cell(40,6,'judul buku',1,0);
$pdf->Cell(30,6,'jenis buku',1,0);
$pdf->Cell(30,6,'pengarang',1,0);
$pdf->Cell(30,6,'penerbit',1,0);
$pdf->Cell(25,6,'tahun terbit',1,0);
$pdf->Cell(20,6,'stok',1,1);
$connect = mysqli_connect("localhost","root","","project-perpustakaan");
$pdf->SetFont('Arial','',10);
$query = mysqli_query($connect, "SELECT * FROM buku");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(20,6,$row['kd_buku'],1,0);
    $pdf->Cell(40,6,$row['jd_buku'],1,0);
    $pdf->Cell(30,6,$row['jns_buku'],1,0);
    $pdf->Cell(30,6,$row['pengarang'],1,0);
    $pdf->Cell(30,6,$row['penerbit'],1,0);
    $pdf->Cell(25,6,$row['th_terbit'],1,0);
    $pdf->Cell(20,6,$row['stok'],1,1);
}

$pdf->Output();
?>
<?php 
	include 'modul/peminjam.php';
	$tampil = new peminjam();

	$aksi = $_GET['aksi'];
	switch ($aksi) {	
		case 'tambahpeminjam':
				$tampil->tambah($_POST['id_peminjam'],$_POST['nis'],$_POST['buku'],$_POST['tgl_pinjam'],$_POST['jth_tempo']);
				header("location:peminjam.php");
			break;
		case 'editbuku':
			$tampil->edit($_GET['id']);
			break;
		case 'hapus':
			$tampil->hapus($_GET['id']);
			header("location:pengembalian.php");
			break;
		case 'update':
			$tampil->update($_POST['id_peminjam'],$_POST['nis'],$_POST['kd_buku'],$_POST['tgl_kembali'],$_POST['telat'],$_POST['denda']);
			header("location:pengembalian.php");
			break;
		
		default:
			# code...
			break;
	}
 ?>
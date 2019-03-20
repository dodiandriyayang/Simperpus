<?php 
	include 'modul/anggota.php';
	$tampil = new anggota();

	$aksi = $_GET['aksi'];
	switch ($aksi) {
		case 'tambahanggota':
				$tampil->tambah($_POST['nis'],$_POST['nama'],$_POST['kelas'],$_POST['jurusan'],$_POST['jenkel'],$_POST['alamat']);
				header("location:anggota.php");
			break;
		case 'editanggota':
			$tampil->edit($_GET['nis']);
			break;
		case 'hapusanggota':
			$tampil->hapus($_GET['nis']);
			header("location:anggota.php");
			break;
		case 'updateanggota':
				$tampil->update($_POST['nis'],$_POST['nama'],$_POST['kelas'],$_POST['jurusan'],$_POST['jenkel'],$_POST['alamat']);
				header("location:anggota.php");
				break;
		default:
			break;
	}
 ?>
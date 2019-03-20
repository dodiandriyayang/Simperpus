<?php 
	include 'modul/buku.php';
	$tampil = new buku();

	$aksi = $_GET['aksi'];
	switch ($aksi) {
		case 'tambahbuku':
				$tampil->tambah($_POST['kd_buku'],$_POST['jd_buku'],$_POST['jns_buku'],$_POST['pengarang'],$_POST['penerbit'],$_POST['th_terbit'],$_POST['stok']);
				header("location:buku.php");
			break;
		case 'editbuku':
			$tampil->edit($_GET['id']);
			break;
		case 'hapusbuku':
			$tampil->hapus($_GET['id']);
			header("location:buku.php");
			break;
		case 'updatebuku':
				$tampil->update($_POST['kd_buku'],$_POST['jd_buku'],$_POST['jns_buku'],$_POST['pengarang'],$_POST['penerbit'],$_POST['th_terbit'],$_POST['stok']);
				header("location:buku.php");
				break;
		case 'paging':
			$tampil->paging($_GET['halaman']);
			break;
		
		default:
			# code...
			break;
	}
 ?>
<?php 
	include 'modul/login.php';
	$tampil = new login();

	$aksi = $_GET['aksi'];
	switch ($aksi) {
		case 'login':
				$tampil->ceklogin($_POST['username'],$_POST['password']);
				if ($_SESSION['level'] == 'admin') {
					echo "jjj ";
				}elseif($_SESSION['level'] == 'petugas'){
					header("location:buku.php");
				}else{
					echo "<script>alert('gagal login');
					document.location.href='../themes/headerlogin.php';</script>";
				}
			break;
			case 'logout':
				session_start();
				session_destroy();
				header("location:index.php");
				break;
		default:
			# code...
			break;
	}
 ?>
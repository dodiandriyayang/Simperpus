<!DOCTYPE html>
<html>
<head>
	<title>SIMPERPUS</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/chosen.css">
	<link rel="stylesheet" type="text/css" href="assets/datepicker.css">
	<script type="text/javascript" src="assets/jquery3-3-1.min.js"></script>
	<script type="text/javascript" src="assets/chosen.jquery.js"></script>
	<script type="text/javascript" src="assets/datepicker.js"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<img src="img/header.jpg" width="1340" height="130">
		</div>
		<div class="subheader" style="position: relative;">
			<img src="img/subheader.jpg" width="1340" height="35">
			<a href="index.php" style="position: absolute;top: 0;"><img src="img/home.png" width="40px" height="38px"></a>
			<?php 
			session_start(); ?>
			<a href="" style="position: absolute;top: 10px;right: 90px;color: white"><?php
				echo $_SESSION['username'];
			 ?></a>
			 <a href="proseslogin.php?aksi=logout" style="position: absolute;top: 10px;right: 30px;color: white">Log Out</a>
		</div>
		
		<div class="row">
			<div class="sidebar">
				<div class="menu">
					<h4 class="label">.:Entry Data:.</h4>
				</div>
				<div class="menu-item">
					<a href="buku.php">Entry Data Buku</a>
				</div>
				<div class="menu-item">
					<a href="anggota.php">Entry Data Anggota</a>
				</div>
				<div class="menu-item">
					<a href="peminjam.php">Entry Data Peminjam</a>
				</div>
				<div class="menu">
					<h4 class="label">.:Data Transaksi:.</h4>
				</div>
				<div class="menu-item">
					<a href="daftarpeminjam.php">Daftar Peminjam</a>
				</div>
				<div class="menu-item">
					<a href="pengembalian.php">Data Pengembalian</a>
				</div>
				<div class="menu">
					<h4 class="label">.:Laporan:.</h4>
				</div>
				<div class="menu-item">
					<a href="lap_buku.php">Laporan Buku</a>
				</div>
				<div class="menu-item">
					<a href="lap_anggota.php">Laporan Anggota</a>
				</div>
				<div class="menu-item">
					<a href="lap_peminjam.php">Laporan Peminjam</a>
				</div>
				<div class="menu-item">
					<a href="lap_pengembalian.php">Laporan Pengembalian</a>
				</div>
			</div>
			<div class="content">
				<div class="isi-content">
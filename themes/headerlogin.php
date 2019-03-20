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
		</div>
		
		<div class="row">
			<div class="sidebar">
				<div class="menu">
					<h4 class="label">.:LOGIN:.</h4>
				</div>
				<div class="login">
					<form method="post" action="proseslogin.php?aksi=login">
						<table cellspacing="4" cellpadding="3">
							<tr>
								<td>Username</td>
								<td><input type="text" name="username"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password"></td>
							</tr>
						</table>
						<center><input class="btn-login" type="submit" name="" value="LOGIN"></center>
					</form>
				</div>
				<div>
					<img src="img/buku.jpg" width="100%" height="345">
				</div>
			</div>
			<div class="content">
				<div class="isi-content">
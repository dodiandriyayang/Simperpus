<?php 
	include 'dbconfig/koneksi.php';

	/**
	 * 
	 */
	class anggota extends database
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function tampildata()
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"SELECT * FROM anggota");
			if ($query ==false) {
				return false;
			}
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}
			return $tampil;
		}

		function tambah($nis,$nama,$kelas,$jurusan,$jenkel,$alamat)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"INSERT INTO anggota VALUES ('$nis','$nama','$kelas','$jurusan','$jenkel','$alamat')");
		}

		function edit($nis)
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"SELECT * FROM anggota WHERE nis='$nis'");
			if($query==false){
				return false;
			}
			$tampil=array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}
			return $tampil;
		}

		function update($nis,$nama,$kelas,$jurusan,$jenkel,$alamat)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"UPDATE anggota set nama='$nama',kelas='$kelas',jurusan='$jurusan',jenkel='$jenkel',alamat='$alamat' WHERE nis='$nis'");
		}

		function hapus($nis)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"DELETE FROM anggota WHERE nis='$nis'");
		}
	}
 ?>
<?php 
	include 'dbconfig/koneksi.php';

	/**
	 * 
	 */
	class peminjam extends database
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function tambah($id,$nis,$buku,$tgl_pinjam,$jth_tempo)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"INSERT INTO peminjam values('$id','$nis','$buku','$tgl_pinjam','$jth_tempo','dipinjam')");
			mysqli_query($conn,"UPDATE buku set stok = (stok-1) where kd_buku = '$buku'");
		}

		function pilihanggota()
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"SELECT nis,nama FROM anggota");
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}
			return $tampil;
		}

		function pilihbuku()
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"SELECT kd_buku,jd_buku FROM buku");
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}
			return $tampil;
		}

		function edit($id)
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"SELECT anggota.nama,buku.jd_buku,peminjam.tgl_pinjam,peminjam.jth_tempo,peminjam.id_peminjam,peminjam.nis,peminjam.kd_buku FROM peminjam  join buku on peminjam.kd_buku = buku.kd_buku join anggota on peminjam.nis = anggota.nis where peminjam.id_peminjam = '$id'");
			if ($query == false) {
				return false;
			}
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[] = $row;
			}
			return $tampil;
		}
		function update($id_peminjam,$nis,$kd_buku,$tgl_kembali,$telat,$denda)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"INSERT INTO pengembalian values('','$id_peminjam','$nis','$kd_buku','$tgl_kembali','$telat','$denda')");
			mysqli_query($conn,"UPDATE peminjam set status='dikembalikan' where id_peminjam ='$id_peminjam'");

			
		}
		function hapus($id)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"DELETE FROM pengembalian where id_pengembalian = '$id'");
		}
	}
?>
<?php 
	/**
	 * 
	 */
	include 'dbconfig/koneksi.php';
	class buku extends database
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function tampildata()
		{
			$query = $this->koneksi->query("SELECT * FROM buku");
			if ($query==false) {
				return false;
			}
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}
			return $tampil;
		}

		function caridata($caridata)
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"select * from buku where jd_buku like '%".$caridata."%'");
			return $query;
		}

		function caridatakosong()
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"select * from buku");
			return $query;
		}

		function tambah($kd_buku,$jd_buku,$jns_buku,$pengarang,$penerbit,$th_terbit,$stok)
		{
			
			$conn = $this->koneksi;

			mysqli_query($conn,"INSERT INTO buku values ('$kd_buku','$jd_buku','$jns_buku','$pengarang','$penerbit','$th_terbit','$stok')");
		}

		function hapus($id)
		{
			$conn = $this->koneksi;
			mysqli_query($conn,"DELETE FROM buku WHERE kd_buku ='$id'");
		}

		function edit ($id)
		{
			$conn = $this->koneksi;
			$query = mysqli_query($conn,"select * from buku where kd_buku ='$id'");	
			$tampil = array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}	
			return $tampil;
		}

		function update($kd_buku,$jd_buku,$jns_buku,$pengarang,$penerbit,$th_terbit,$stok)
		{
			
			$conn = $this->koneksi;

			mysqli_query($conn,"UPDATE buku set jd_buku = '$jd_buku',jns_buku='$jns_buku',pengarang='$pengarang',penerbit='$penerbit',th_terbit='$th_terbit',stok='$stok' WHERE kd_buku='$kd_buku'");
		}

		function paging($halaman)
		{
			$conn = $this->koneksi;
			$per_page = 5;
			$page = isset($halaman)?(int)$halaman:1;
			$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
			$query = mysqli_query($conn,("SELECT * FROM buku limit $mulai,$per_page"));
			$sql = mysqli_query($conn,("SELECT * FROM buku"));
			$total = mysqli_num_rows($sql);
			$pages = ceil($total/$per_page);
			$no = $mulai+1;
			$tampil=array();
			while ($row = $query->fetch_assoc()) {
				$tampil[]=$row;
			}	
			return $tampil;
		}
	}
?>
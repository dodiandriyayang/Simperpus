<?php 
	include 'modul/buku.php';
	$ambil = new buku();
	$caridata =$_POST['caridata'];
	$query = $ambil->caridata($caridata);
	$row = mysqli_num_rows($query);
	if ($row > 0) {
		while ($data = mysqli_fetch_array($query)) {
			echo "
			<tr>
			<td>".$data['kd_buku']."</td>
			<td>".$data['jd_buku']."</td>
			<td>".$data['jns_buku']."</td>
			<td>".$data['pengarang']."</td>
			<td>".$data['penerbit']."</td>
			<td>".$data['th_terbit']."</td>
			<td>".$data['stok']."</td>
			<td><a href='#' class='edit' id=".$data['kd_buku'].">edit</a>
				<a class='hapus' href='prosesbuku.php?aksi=hapusbuku&id=".$data['kd_buku']."'>hapus</a>
			</td>
			</tr>";
		}
	}else{
		echo "<td colspan=8>data tidak ditemukan</td>";
	}
 ?>
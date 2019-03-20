<?php 
	$conn = mysqli_connect("localhost","root","","project-perpustakaan");
	$per_page = 5;
	$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
	$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
	$query = mysqli_query($conn,("SELECT * FROM buku limit $mulai,$per_page"));
	$sql = mysqli_query($conn,("SELECT * FROM buku"));
	$total = mysqli_num_rows($sql);
	$pages = ceil($total/$per_page);
	while ( $data = mysqli_fetch_array($query)) 
	{
	
		echo "
		<tr>
		<td>".$data['kd_buku']."</td>
		<td>".$data['jd_buku']."</td>
		<td>".$data['jns_buku']."</td>
		<td>".$data['pengarang']."</td>
		<td>".$data['penerbit']."</td>
		<td>".$data['th_terbit']."</td>
		<td>".$data['stok']."</td>
		<td><a href='' id=".$data['kd_buku']." class='edit'>edit</a>
		<a class='hapus' href='prosesbuku.php?aksi=hapusbuku&id=".$data['kd_buku']."'>hapus</a>
		</td>
		</tr>";
}
?>
<?php 
	include 'modul/buku.php';
	$ambil = new buku();
	$id = $_GET['id'];
	$tampil = $ambil->edit($id);
	if(is_array($tampil)){
	foreach ($tampil as $data) {
echo "
	<form method='post' id='tabel-edit' action='prosesbuku.php?aksi=updatebuku'> 
		<table cellspacing='15' cellpadding='5'>
			<tr>
				<td>No Buku</td>
				<td><input type='text' name='kd_buku' id='kd_buku' value=".$data['kd_buku']."></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td><input type='text' name='jd_buku' id='jd_buku' value=".$data['jd_buku']."></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td><input type='text' name='jns_buku' id='jns_buku' value=".$data['jns_buku']."></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type='text' name='pengarang' id='pengarang' value=".$data['pengarang']."></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type='text' name='penerbit' id='penerbit' value=".$data['penerbit']."></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td><input type='text' name='th_terbit' id='th_terbit' value=".$data['th_terbit']."></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type='text' name='stok' id='stok' value=".$data['stok']."></td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='submit'  value='update'>
					<button id='batal'>Batal</button>
				</td>
				</tr>
			</table>
		</form>";
	}
}
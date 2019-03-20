<?php 
	include 'modul/peminjam.php';
	$ambil = new peminjam();
	$id = $_GET['id_peminjam'];
	$tampil = $ambil->edit($id);
	if(is_array($tampil)){
	foreach ($tampil as $data) {
	 	$denda = 2000;
	 	$start = new DateTime($data['jth_tempo']);
	 	$end_start = new DateTime();
	 	$selisih = $start->diff($end_start);

	 	if ($end_start <= $start ) {
	 		$kenadenda = 0;
	 		$selisih_hari = 0;
	 	}elseif($end_start > $start) {
	 		$kenadenda = $selisih->days * $denda;
	 		$selisih_hari = $selisih->days;
	 	}
echo "
	<form method='post' id='tabel-edit' action='prosespeminjam.php?aksi=update'> 
		<table cellspacing='15' cellpadding='5'>
			<tr>
				<td>Nama</td>
				<td><input type='text' name='nama' id='nama' value=".$data['nama'].">
					<input type='hidden' name='id_peminjam' id='id_peminjam' value=".$data['id_peminjam'].">
					<input type='hidden' name='nis' id='nis' value=".$data['nis'].">
				</td>
			</tr>
			<tr>
				<td>Buku</td>
				<td><input type='text' name='kd_buku' id='kd_buku' value=".$data['jd_buku'].">
				<input type='hidden' name='kd_buku' id='kd_buku' value=".$data['kd_buku'].">
				</td>
			</tr>
			<tr>
				<td>Tgl Pinjam</td>
				<td><input type='text' name='tgl_pinjam' id='tgl_pinjam' value=".$data['tgl_pinjam']."><td>
			</tr>
			<tr>
				<td>Tgl Jatuh tempo</td>
				<td><input type='text' name='jth_tempo' id='jth_tempo' value=".$data['jth_tempo']."></td>
			</tr>
			<tr>
				<td>Tgl Kembali</td>
				<td><input type='text' name='tgl_kembali' id='tgl_kembali' value=".date('d-m-Y')."></td>
			</tr>
			<tr>
				<td>Telat</td>
				<td><input type='text' name='telat' id='telat' value=".$selisih_hari."></td>
			</tr>
			<tr>
				<td>Denda</td>
				<td><input type='text' name='denda' id='denda' value=".$kenadenda."></td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='submit'  value='KEMBALIKAN'>
					<button id='bataledit'>Batal</button>
				</td>
				</tr>
			</table>
		</form>";
	}
}
<?php 
	include 'modul/anggota.php';
	$ambil = new anggota();
	$nis = $_GET['nis'];
	$tampil = $ambil->edit($nis);
	if(is_array($tampil)){
	foreach ($tampil as $data) {
echo "
	<form method='post' id='tabel-edit' action='prosesanggota.php?aksi=updateanggota'> 
		<table cellspacing='15' cellpadding='5'>
			<tr>
				<td>Nis</td>
				<td><input type='text' name='nis' id='nis' value=".$data['nis']."></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type='text' name='nama' id='nama' value=".$data['nama']."></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name='kelas' id='kelas'>
					<option ".($data['kelas'] == '10' ? 'selected' : '')." value='10'>10</option>
					<option ".($data['kelas'] == '11' ? 'selected' : '')." value='11'>11</option>
					<option ".($data['kelas'] == '12' ? 'selected' : '')." value='12'>12</option>
					</select></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><select name='jurusan' id='jurusan'>
					<option ".($data['jurusan'] == 'IPA' ? 'selected' : '')." value='IPA'>IPA</option>
					<option ".($data['kelas'] == 'IPS' ? 'selected' : '')." value='IPS'>IPS</option>
					<option ".($data['kelas'] == 'Bhs.Indonesia' ? 'selected' : '')." value='Bhs.Indonesia'>Bhs.Indonesia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>jenkel</td>
				<td><select name='jenkel' id='jenkel'>
					<option ".($data['jenkel'] == 'laki-laki' ? 'selected' : '')." value='laki-laki'>Laki-Laki</option>
					<option ".($data['jenkel'] == 'perempuan' ? 'selected' : '')." value='laki-laki'>perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name='alamat' id='alamat'>".$data['alamat']."</textarea></td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='submit'  value='update'>
					<button id='bataledit'>Batal</button>
				</td>
				</tr>
			</table>
		</form>";
	}
}
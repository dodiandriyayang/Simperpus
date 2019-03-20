<?php include 'themes/header.php'; ?>
<?php include 'modul/peminjam.php';
	$tampil = new peminjam();
 ?>
<div class="title">
	<h3>.:Entry Data Peminjam</h3>
</div>
<div class="table-peminjam">
	<form method="post" id="tabel-form" action="prosespeminjam.php?aksi=tambahpeminjam">
		<table cellspacing="15" cellpadding="5">
			<tr>
				<td>Nama</td>
				<td><select name="nis" id="nis" style="width: 176px">
					<option>---Pilih Nama Anggota---</option>
					<?php 
						$ambil = $tampil->pilihanggota();
						foreach ($ambil as $data) {
					 ?>
					<option value="<?php echo $data['nis']?>"><?php echo $data['nama'];?></option>
				<?php } ?>
				</select>
				<td><input type="hidden" name="id_peminjam" id="id_peminjam"></td>
			</td>
		</tr>
		<tr>
			<td>Buku</td>
			<td><select name="buku" id="buku" style="width: 176px">
					<option>----Pilih Nama Buku----</option>
					<?php 
						$ambil = $tampil->pilihbuku();
						foreach ($ambil as $data) {
					 ?>
					<option value="<?php echo $data['kd_buku']?>"><?php echo $data['jd_buku'];?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td>
				<input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo date("d-m-Y") ?>" readonly="">
			</td>
		</tr>
		<tr>
			<td>Jatuh Tempo</td>
			<td>
				<input type="text" name="jth_tempo" id="jth_tempo">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="" value="Tambah">
				<button id="batal">Batal</button>
			</td>
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#nis").chosen({
			no_result_text:"Tidak ditemukan...!"
		});
		$("#buku").chosen({
			no_result_text:"Tidak ditemukan...!"
		});
		$("#jth_tempo").datepicker({
			dateFormat :"dd-mm-yy",
			changeMonth : true,
			changeYear : true,
		});
	})
</script>
<?php include 'themes/footer.php'; ?>
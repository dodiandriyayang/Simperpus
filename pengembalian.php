<?php include 'themes/header.php'; ?>
<div class="title">
	<h3>.:Daftar Pengembalian</h3>
</div>

<div id="tampiledit">
	
</div>
	<div class="tp">
		<div class="sp">
			<label>Pencarian data</label>
			<input type="text" name="caridata" placeholder="search" id="caridata">
		</div>
		<table class="tpdata">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Buku</th>
					<th>Tgl Pinjam</th>
					<th>Tgl Jatuh Tempo</th>
					<th>Tgl Kembali</th>
					<th>Telat</th>
					<th>Denda</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="mytable">
				<?php 
				$conn = mysqli_connect("localhost","root","","project-perpustakaan");
				$per_page = 5;
				$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
				$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
				$query = mysqli_query($conn,"SELECT buku.jd_buku,anggota.nama,peminjam.tgl_pinjam,peminjam.jth_tempo,pengembalian.id_pengembalian,pengembalian.tgl_kembali,pengembalian.telat,pengembalian.denda FROM pengembalian join anggota on pengembalian.nis = anggota.nis join peminjam on pengembalian.id_peminjam = peminjam.id_peminjam join buku on pengembalian.kd_buku = buku.kd_buku limit $mulai,$per_page");
				$sql = mysqli_query($conn,"SELECT anggota.nama,peminjam.tgl_pinjam,peminjam.jth_tempo,pengembalian.tgl_kembali,pengembalian.id_pengembalian,pengembalian.telat,pengembalian.denda FROM pengembalian join anggota on pengembalian.nis = anggota.nis join peminjam on pengembalian.id_peminjam = peminjam.id_peminjam join buku on pengembalian.kd_buku = buku.kd_buku");
				$total = mysqli_num_rows($sql);
				$pages = ceil($total/$per_page);
				$no = $mulai+1;

				while ( $data = mysqli_fetch_array($query)) 
					{
				?>
					<tr>
						<td width="5"><?php echo $no++; ?>
						</td>
						<td width="50"><?php echo $data['nama']; ?></td>
						<td width="70"><?php echo $data['jd_buku']; ?></td>
						<td width="5"><?php echo $data['tgl_pinjam']; ?></td>
						<td width="5"><?php echo $data['jth_tempo']; ?></td>
						<td width="5"><?php echo $data['tgl_kembali']; ?></td>
						<td width="5"><?php echo $data['telat']; ?></td>
						<td width="5"><?php echo $data['denda']; ?></td>
						<td width="5">
							<a class="hapus" href="prosespeminjam.php?aksi=hapus&id=<?php echo $data['id_pengembalian'];?>">hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="paging">
		Page<?php for ($i=1; $i<=$pages ; $i++) { ?>
		<a href="?halaman=<?php echo $i;?>"><?php echo $i; ?></a>
		<?php } ?>
	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click",".edit",function(e){
				e.preventDefault();
				var id = $(this).attr("id");
				$.ajax({
					url : "kembalikan.php",
					type:"GET",
					data : "id_peminjam="+id,
					success : function(data){
						$("#tampiledit").load("kembalikan.php","id_peminjam="+id);
						console.log(data);
						$(".sp").hide();
					}
				})
			})
			$("#bataledit").click(function(){
				$("#tampiledit").hide();
				$(".sp").show();
			})
			$(".hapus").click(function(e){
				e.preventDefault();
				var jawab = confirm("Yakin ingin menghapus data ini ?");
				if (jawab == true) {
					$.ajax({
						url : $(this).attr("href"),
						type : "GET",
						success : function(){
						$(this).location.reload();
					}
				})	
				}else{
					return false;
				}
			})
		})
	</script>
	<?php include 'themes/footer.php'; ?>

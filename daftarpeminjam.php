<?php 
require_once 'themes/header.php';
include 'modul/peminjam.php';
$ambil = new peminjam();
?>

<div class="title">
	<h3>.:Daftar Peminjam</h3>
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="mytable">
				<?php 
				$conn = mysqli_connect("localhost","root","","project-perpustakaan");
				$per_page = 5;
				$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
				$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
				$query = mysqli_query($conn,"SELECT anggota.nama,buku.jd_buku,peminjam.tgl_pinjam,peminjam.jth_tempo,peminjam.id_peminjam FROM peminjam  join buku on peminjam.kd_buku = buku.kd_buku join anggota on peminjam.nis = anggota.nis where peminjam.status = 'dipinjam' limit $mulai,$per_page");
				$sql = mysqli_query($conn,"SELECT anggota.nama,buku.jd_buku,peminjam.tgl_pinjam,peminjam.jth_tempo,peminjam.id_peminjam FROM peminjam  join buku on peminjam.kd_buku = buku.kd_buku join anggota on peminjam.nis = anggota.nis where peminjam.status = 'dipinjam'");
				$total = mysqli_num_rows($sql);
				$pages = ceil($total/$per_page);
				$no = $mulai+1;

				while ( $data = mysqli_fetch_array($query)) 
					{
				?>
					<tr>
						<td width="5"><?php echo $no++; ?>
							<input type="hidden" name="" value="<?php echo $data['id_peminjam']; ?>">
						</td>
						<td width="80"><?php echo $data['nama']; ?></td>
						<td width="100"><?php echo $data['jd_buku']; ?></td>
						<td width="5"><?php echo $data['tgl_pinjam']; ?></td>
						<td width="5"><?php echo $data['jth_tempo']; ?></td>
						<td width="50">
							<a href="#" class="edit" id="<?php echo $data['id_peminjam'];?>">kembalikan</a>
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
		})
	</script>
	<?php include 'themes/footer.php'; ?>

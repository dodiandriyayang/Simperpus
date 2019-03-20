<?php 
require_once 'themes/header.php';
include 'modul/anggota.php';
$ambil = new anggota();
?>

<div class="title">
	<h3>.:Entry Data Anggota</h3>
</div>
<div class="table">
	<form method="post" id="tabel-form" action="prosesanggota.php?aksi=tambahanggota">
		<table cellspacing="15" cellpadding="5">
			<tr>
				<td>Nis</td>
				<td><input type="text" name="nis" id="nis"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" id="nama"></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name="kelas" id="kelas">
					<option value="">---Pilih Kelas---</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><select name="jurusan" id="jurusan">
					<option value="">---Pilih Jurusan---</option>
					<option value="IPA">IPA</option>
					<option value="IPS">IPS</option>
					<option value="Bhs.Indonesia">Bhs.Indonesia</option>
				</select></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select name="jenkel" id="jenkel">
					<option value="">---Jenis Kelamin---</option>
					<option value="laki-laki">Laki-Laki</option>
					<option value="perempuan">Perempuan</option>
				</select></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" id="alamat"></textarea>
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
	<!--edit-->
	<div id="tampiledit">
		
	</div>
	<div class="tampiltabel">
		<button class="btn">+ Tambah Data</button>
		<div class="search">
			<label>Pencarian data</label>
			<input type="text" name="caridata" placeholder="search" id="caridata">
		</div>
		<table class="tabeldata">
			<thead>
				<tr>
					<th>No</th>
					<th>Nis</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Jurusan</th>
					<th>Jenkel</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="mytable">
				<?php 
				$conn = mysqli_connect("localhost","root","","project-perpustakaan");
				$per_page = 5;
				$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
				$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
				$query = mysqli_query($conn,("SELECT * FROM anggota limit $mulai,$per_page"));
				$sql = mysqli_query($conn,("SELECT * FROM anggota"));
				$total = mysqli_num_rows($sql);
				$pages = ceil($total/$per_page);
				$no = $mulai+1;

				while ( $data = mysqli_fetch_array($query)) 
					{
				?>
					<tr>
						<td width="5"><?php echo $no++; ?></td>
						<td width="80"><?php echo $data['nis']; ?></td>
						<td width="100"><?php echo $data['nama']; ?></td>
						<td width="5"><?php echo $data['kelas']; ?></td>
						<td width="5"><?php echo $data['jurusan']; ?></td>
						<td width="60"><?php echo $data['jenkel']; ?></td>
						<td width="150"><?php echo $data['alamat']; ?></td>
						<td width="50">
							<a href="#" class="edit" id="<?php echo $data['nis'];?>">edit</a>
							<a class="hapus" href="prosesanggota.php?aksi=hapusanggota&nis=<?php echo $data['nis'];?>">hapus</a>
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
			$(".btn").click(function(){
				$(".table").css("display","block");
				$(".btn").hide();
				$(".search").hide();
			})
			$(document).on("click","#batal",function(e){
				e.preventDefault();
				$(".table").css('display','none');	
				$(".btn").show();
				$(".search").show();
			})
			$(document).on("click","#bataledit",function(e){
				e.preventDefault();
				$(".btn").show();
				$(".search").show();
				$("#tampiledit").hide();
			})
			$(document).on("click",".edit",function(e){
				e.preventDefault();
				var id = $(this).attr("id");
				$.ajax({
					url : "editanggota.php",
					type:"GET",
					data : "nis="+id,
					success : function(data){
						$("#tampiledit").load("editanggota.php","nis="+id);
						console.log(data);
						$(".btn").hide();
						$(".search").hide();
						$("#tampiledit").show();
					}
				})
			})

			$(document).on("click",".hapus",function(e){
				e.preventDefault();
				var tanya = confirm("yakin menghapus data ini?");
				if (tanya == true) {
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

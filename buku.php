<?php 
require_once 'themes/header.php';
include 'modul/buku.php';
$ambil = new buku();
?>

<?php 
	$conn = mysqli_connect("localhost","root","","project-perpustakaan");
	$query = "select max(kd_buku) as maxkode from buku";
	$hasil = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($hasil);
	$kodebuku = $data['maxkode'];

	$nourut = (int) substr($kodebuku, 3,3);

	$nourut++;
	$char = "BK";
	$newid = $char . sprintf('%03s',$nourut);
?>

<div class="title">
	<h3>.:Entry Data Buku</h3>
</div>
<div class="table">
	<form method="post" id="tabel-form" action="prosesbuku.php?aksi=tambahbuku">
		<table cellspacing="15" cellpadding="5">
			<tr>
				<td>No Buku</td>
				<td><input type="text" name="kd_buku" id="kd_buku" value="<?php echo $newid ?>" readonly=""></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="jd_buku" id="jd_buku"></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td><input type="text" name="jns_buku" id="jns_buku"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" name="pengarang" id="pengarang"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" name="penerbit" id="penerbit"></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td><input type="text" name="th_terbit" id="th_terbit"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" name="stok" id="stok"></td>
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
				<th>No Buku</th>
				<th>Judul Buku</th>
				<th>Jenis Buku</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody id="mytable">
			<?php 
			$conn = mysqli_connect("localhost","root","","project-perpustakaan");
			$per_page = 5;
			$page = isset($_GET['halaman'])?(int)$_GET['halaman']:1;
			$mulai = ($page>1) ? ($page * $per_page) - $per_page : 0;
			$query = mysqli_query($conn,("SELECT * FROM buku limit $mulai,$per_page"));
			$sql = mysqli_query($conn,("SELECT * FROM buku"));
			$total = mysqli_num_rows($sql);
			$pages = ceil($total/$per_page);
			$no = $mulai+1;
			while ( $data = mysqli_fetch_array($query)) 
			{
				?>
				<tr>
					<td><?php echo $data['kd_buku']; ?></td>
					<td><?php echo $data['jd_buku']; ?></td>
					<td><?php echo $data['jns_buku']; ?></td>
					<td><?php echo $data['pengarang']; ?></td>
					<td><?php echo $data['penerbit']; ?></td>
					<td><?php echo $data['th_terbit']; ?></td>
					<td><?php echo $data['stok']; ?></td>
					<td>
						<a href="#" class="edit" id="<?php echo $data['kd_buku'];?>">edit</a>
						<a class="hapus" href="prosesbuku.php?aksi=hapusbuku&id=<?php echo $data['kd_buku'];?>">hapus</a>
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
		$(document).keyup("#caridata",function(){
			var caridata = $("#caridata").val();
			if (caridata != "") {
				$.ajax({
					url : "caridatabuku.php",
					type : "post",
					data : "caridata="+caridata,
					success : function(data){
						$("#mytable").html(data);
					}
				})
			}else{
				$.ajax({
					url : "caridatabukukosong.php",
					type : "post",
					success : function(data){
						$("#mytable").html(data);
					}
				})
			}	
		})	
		$(".btn").click(function(){
			$(".table").css("display","block");
			$(".btn").hide();
			$(".search").hide();
		})
		$("#batal").click(function(e){
			e.preventDefault();
			$(".table").css('display','none');	
			$(".btn").show();
			$(".search").show();
		})
		$(document).on("click",".edit",function(e){
			e.preventDefault();
			var id = $(this).attr("id");
			$.ajax({
				url : "editbuku.php",
				type:"GET",
				data : "id="+id,
				success : function(data){
					$("#tampiledit").load("editbuku.php","id="+id);
					console.log(data);
					$(".btn").hide();
					$(".search").hide();
				}
			})
		})
		$(document).on("click",".hapus",function(){
			var jawab = confirm("yakin ingin mengahapus data ini ?");
			if (jawab == true){
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
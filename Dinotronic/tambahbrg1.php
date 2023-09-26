<!-- CSS -->
<style type="text/css">
	.content{margin-left:25%; width: 60%;height: auto;padding-bottom: 30px;}
	table,th,tr,td{border: 2px solid black;text-align: center;text-decoration: none;}
	.data1{width: 90%;margin-top: 50px;margin-left: 30px;}
	.col-md-12{margin-top: 30px;}
	input{width: 100px;}
	.btn-primary{width: 75px;border: 1px solid dodgerblue;border-radius: 5px;color: #fff; box-shadow: 1px 1px 1px 1px lightgray;}
	.btn-primary:hover{background-color: royalblue ; border: 1px solid dodgerblue ;}
</style>

<!-- Content -->
<div class="content" >
	<div class="data1">
		<div class="container">
			<form action="" method="POST">
				<div class="col-md-12" >
					<h3>Tambah Barang</h3>

					<table class="table table-striped" border="0">	
						<thead>
							<th>ID</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Stok</th>
							<th>Tambah</th>
						</thead>
						<tbody>
							<td></td>
							<td><input type="text" required name="nama_barang"></td>
							<td><input type="number" min="0" required name="harga_barang"></td>
							<td><input type="number" min="0" required name="stok"></td>
							<td><button class="btn-primary" name="simpan" value="simpan">Simpan</button></td>
						
							<?php
							include 'koneksi.php';

							$nama = @$_POST['nama_barang'];
						    $harga = @$_POST['harga_barang'];
						    $stok = @$_POST['stok'];

						    if (isset($_POST['simpan'])) {
								$query = "CALL InsertDataBarang(:nama, :harga, :stok)";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(':nama', $nama);
								$stmt->bindParam(':harga', $harga);
								$stmt->bindParam(':stok', $stok);
							
								$nama = $_POST['nama_barang']; 
								$harga = $_POST['harga_barang']; 
								$stok = $_POST['stok'];
							
								if ($stmt->execute()) {
									echo '<script language="javascript">alert("Tambah Data Berhasil !!!"); document.location="index.php?page=produk";</script>';
								} else {
									echo 'Gagal menambahkan data';
								}
							}
							
							?>
						</tbody>
					</table>
					
				</div>
			</form>
		</div>
	</div>
</div>
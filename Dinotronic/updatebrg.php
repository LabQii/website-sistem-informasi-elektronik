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
					<h3>Update Barang</h3>
					<table class="table table-striped" border="0">	
						<thead>
							<th>ID</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Stok</th> 
							<th>Update</th>
						</thead>
						<tbody>

							<?php
							
								include("koneksi.php");
								$query = 'SELECT * FROM view_data_barang WHERE id_barang = :id_barang';
								$stmt = $conn->prepare($query);
								$stmt->bindParam(':id_barang', $_GET['id_barang']);
								$stmt->execute();
								
								if ($stmt->rowCount() > 0) {
									$row = $stmt->fetch(PDO::FETCH_ASSOC);
									$idbarang = $row['id_barang'];
									$namabarang = $row['nama_barang'];
									$hargabarang = $row['harga_barang'];
									$stokbarang = $row['stok'];
									$totalbarangterjual = $row['total_barang_terjual'];
								} else {
									// Data not found
								}
								
								$id = $_GET['id_barang'];
						    ?>	

							    <td><?php echo $idbarang; ?></td>
								<td><input type="text" name="nama_barang" required value="<?php echo $namabarang; ?>"></td>
								<td><input type="number" name="harga_barang" min="0" required value="<?php echo $hargabarang; ?>"></td>
								<td><input type="number" name="stok" min="0" required value="<?php echo $stokbarang; ?>"></td>
								<td><button class="btn-primary" name="simpan" value="simpan">Simpan</button></td>
							

							<?php
							$id_barang = $_GET['id_barang'];

							$nama = @$_POST['nama_barang'];
						    $harga = @$_POST['harga_barang'];
						    $stok = @$_POST['stok'];

						    if (isset($_POST['simpan'])) {
								$query = "UPDATE data_barang SET nama_barang=:nama, harga_barang=:harga, stok=:stok WHERE id_barang=:id_barang";
								$stmt = $conn->prepare($query);
								$stmt->bindParam(':nama', $nama);
								$stmt->bindParam(':harga', $harga);
								$stmt->bindParam(':stok', $stok);
								$stmt->bindParam(':id_barang', $id_barang);
								
								if ($stmt->execute()) {
									echo '<script language="javascript">alert("Update Data Berhasil !!!"); document.location="index.php?page=produk";</script>';
								} else {
									// Gagal melakukan update
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
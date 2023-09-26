<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php
	include('koneksi.php');
?>
<!-- CSS -->
<style type="text/css">
	.content{margin-left:25%; width: 60%;height: auto;padding-bottom: 30px;}
	table,th,tr,td{border: 2px solid black;text-align: center;text-decoration: none;}
	.data1{width: 90%;margin-top: 50px;margin-left: 30px;}
	.col-md-12{margin-top: 30px;}
	.bi-pencil-fill{color: orange; font-size: 20px;}
		.bi-pencil-fill:hover{color: darkcyan;}
	.bi-trash-fill{color: black;font-size: 20px;}
		.bi-trash-fill:hover{color: gray;}
	.bi-plus-circle-fill{color: dodgerblue;font-size: 20px;}
	.box1{float: left;} .box2{float: right;}
	.bi-plus-circle-fill{color: white;}
	.btn-tambah{width: 100px;background:dodgerblue;border: 1px solid dodgerblue;border-radius: 5px;color: #fff; box-shadow: 1px 1px 1px 1px lightgray;}
	.btn-tambah:hover{background-color: black ; border: 1px solid black ;}
	a{color: white; text-decoration: none;}
</style>

<!-- Content -->
<div class="content" >
	<div class="data1">
		<div class="container">
			<div class="col-md-12" >
				<div class="box1"><h3>Data Barang</h3></div>
				<form method="post">
				
				<td ><button style="margin-left: 215px; margin-top: 6px;" class="btn-tambah" name="tstok" value="tstok">12 Stok
					&nbsp;<i class="fas fa-plus"></i></button></td>

					<td ><button style="margin-left: 0px; margin-top: 6px;" class="btn-tambah" name="hapus" value="hapus">Hapus 
					&nbsp;<i class="fas fa-trash"></i></button></td>

					<div class="box2"><button type="submit"  class="btn-tambah" ><a href="index.php?page=tambahbrg1">Tambah
					<i class="bi bi-plus-circle-fill"></i></a></button></div>
				</form>
				
				<table class="table table-striped" border="0">	
					<thead>
						<th>ID</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Stok</th>
						<th>Total Barang Terjual</th>
						<th>Update</th>
						<th>Delete</th>
					</thead>
					<tbody>

						<?php
	                        $query="SELECT * FROM data_barang";
	                        $execute=$conn->query($query);
	                        if ($execute->rowCount() > 0) {
								$no = 1;
								while ($data = $execute->fetch(PDO::FETCH_ASSOC)) {
									echo "
									<tr id='data'>
										<td>$data[id_barang]</td>
										<td>$data[nama_barang]</td>
										<td>$data[harga_barang]</td>
										<td>$data[stok]</td>
										<td>$data[total_barang_terjual]</td>
										<td>
											<div class='norebuttom'>
												<a class='btn-update' href='./?page=updatebrg&id_barang=$data[id_barang]'><i class='bi bi-pencil-fill'></i></a>
											</div>
										</td>
										<td>
											<div class='norebuttom'>
												<a class='btn-hapus' href='delete.php?id_barang=$data[id_barang]'><i class='bi bi-trash-fill'></i></a>
											</div>
										</td>
									</tr>";
									$no++;
								}
							} else {
								echo "<tr><td class='text-center text-green' colspan='7'><b>Kosong</b></td></tr>";
							}
	                    ?>

						<?php
							if (isset($_POST['hapus'])) {
								try {
									$query = "CALL DeleteDataBarang()";
									$stmt = $conn->prepare($query);

									if ($stmt->execute()) {
										echo '<script language="javascript">alert("Hapus Data Berhasil !!!"); document.location="index.php?page=produk";</script>';
									} else {
										echo 'Gagal menghapus data';
									}
								} catch (PDOException $e) {
									echo 'Error: ' . $e->getMessage();
								}
							}

							$conn = null;
						?>	

						<?php
						include('koneksi.php');
							if (isset($_POST['tstok'])) {
								try {
									// Periksa apakah koneksi tersedia
									if ($conn) {
										$query = "CALL DuabelasStokBarang()";
										$stmt = $conn->prepare($query);

										if ($stmt->execute()) {
											echo '<script language="javascript">alert("Tambah 12 Data Berhasil !!!"); document.location="index.php?page=produk";</script>';
										} else {
											echo 'Gagal menghapus data';
										}
									} else {
										echo 'Koneksi database tidak tersedia';
									}
								} catch (PDOException $e) {
									echo 'Error: ' . $e->getMessage();
								}
							}

							$conn = null;
						?>


					</tbody>
				</table>
				<button class="btn-primary" onclick="window.history.back()" style="border-radius: 6px;">Kembali ke halaman sebelumnya ~></button>
			</div>
		</div>
	</div>
</div>
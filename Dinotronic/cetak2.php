<?php
	include('koneksi.php');
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
<!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
<!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>   

    <!-- CSS -->
	<style type="text/css">
		.content{margin-left:25%; width: 60%;height: auto;padding-bottom: 30px;}
		table,th,tr,td{border: 2px solid black;text-align: center;text-decoration: none;}
		.data1{width: 90%;margin-top: 50px;margin-left: 30px;}
		.col-md-12{margin-top: 30px;}
		input{width: 100px;}
		.btn-update{width: 75px;background:orange;border: 1px solid orange;border-radius: 5px;color: #fff; box-shadow: 1px 1px 1px 1px lightgray;}
		.btn-update:hover{background-color: dodgerblue ; border: 1px solid dodgerblue ;}

    .content{margin-left:25%; width: 60%;height: auto;padding-bottom: 30px;}
    table,th,tr,td{border: 2px solid black;text-align: center;}
    .data1{width: 90%;margin-top: 50px;margin-left: 30px;}
    .col-md-12{margin-top: 30px;}
    .btn-beli{width: 60px;background:black;border: 1px solid black;border-radius: 5px;color: #fff; box-shadow: 1px 1px 1px 1px lightgray;}
    .btn-beli:hover{background-color: dodgerblue ; border: 1px solid dodgerblue ;}
    input{margin-right: 10px;width: 100px;}
    a, u {
      text-decoration: none;
      color: inherit;
    }
	</style>

	<!-- Content -->
	<div class="content" >
		<div class="data1">
			<div class="container">
				<form action="" method="POST">
					<div class="col-md-12" >
						<h3>History Pembelian</h3>
						<table class="table table-striped" border="0">	
							<thead>
								<th>ID</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total Harga</th>
							<!-- Example-->
							</thead>
							<tbody>

								<!-- penerapan view - modul 2 -->
								<?php
								

									// $result = mysqli_query($conn, "CREATE VIEW view_pembayaran2 as SELECT * from data_pembayaran");
									$stmt = $conn->query("SELECT * FROM view_pembayaran");
									while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								?>	

										<tr>
										<td><?php echo $row['id_transaksi']; ?></td>
										<td><?php echo $row['nama_produk']??''; ?></td>
										<td><?php echo $row['harga_produk']??''; ?></td>
										<td><?php echo $row['jumlah_pembelian']??''; ?></td>
										<td><?php echo $row['total_harga']??''; ?></td>
										</tr>

								<?php
									} 
								?>
								
							</tbody>
						</table>
						
					</div>
				</form>
			</div>
		</div>
	</div>


	<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</body>

<script>
    window.print(); 
</script>

</html>
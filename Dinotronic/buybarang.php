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

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxs-like bx-tada-hover'></i>
      <span class="logo_name">Dinotronic</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="index.php?page=beranda">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php?page=beranda">Beranda</a></li>
        </ul>
      </li>
      <li>
      <li>
        <a href="index.php?page=produk">
          <i class="bi bi-collection-fill"></i>
          <span class="link_name">Produk</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php?page=produk">Produk</a></li>
        </ul>
      </li>
      <li>
        <a href="keranjang.php">
          <i class="bi bi-cart4"></i>
          <span class="link_name">Keranjang</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="keranjang.php">Keranjang</a></li>
        </ul>
      </li>
      <li>
        <a href="index.php?page=history">
          <i class="bi bi-cash"></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php?page=history">History</a></li>
        </ul>
      </li>
    </li>
    <li>
        <a href="logpem.php">
          <i class="bi bi-cart4"></i>
          <span class="link_name">Log Hapus</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logpem.php">Log Hapus</a></li>
        </ul>
    </li>
  </li>
  <li>
        <a href="loglog.php">
          <i class="bi bi-clock-history"></i>
          <span class="link_name">Laporan Penjualan</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="loglog.php">Laporan Penjualan</a></li>
        </ul>
    </li>
  </li>

</ul>
  </div>
  <div class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dinotronic 'Toko Elektronik Terpercaya</span>
    </div>
  </div>
    <div id="main-body">    

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
				<form action="buyproses.php" method="POST">
					<div class="col-md-12" >
						<h3>Pembelian Barang</h3>
						<table class="table table-striped" border="">	
							<thead>
								<th>ID</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Beli Barang</th>
							</thead>

							<tbody>

                  <!-- penerapan stored procedure -->
                  <?php 
                      $id = $_GET['id'];
                      $stmt = $conn->prepare("CALL SeeBarang(:id)");
                      $stmt->bindParam(':id', $id);
                      $stmt->execute();
                      
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          // Memastikan kunci-kunci ada dalam array sebelum mengaksesnya
                          $idBarang = isset($row['id_barang']) ? $row['id_barang'] : '';
                          $namaBarang = isset($row['nama_barang']) ? $row['nama_barang'] : '';
                          $hargaBarang = isset($row['harga_barang']) ? $row['harga_barang'] : '';
                          $stokBarang = isset($row['stok_barang']) ? $row['stok_barang'] : '';                                                        
                  ?>
                  
                  <tr>
  								<td><input type="hidden" name="idbarang" value="<?php echo $row['id_barang']; ?>"><?php echo $row['id_barang']; ?></td>
  								<td><input type="hidden" name="namabarang" value="<?php echo $row['nama_barang']; ?>"><?php echo $row['nama_barang']; ?></td>
  								<td><input type="hidden" name="hargabarang" value="<?php echo $row['harga_barang']; ?>"><?php echo $row['harga_barang']; ?></td>
  								<td><input type="hidden" name="stokbarang" value="<?php echo $row['stok']; ?>"><?php echo $row['stok']; ?></td>
  								<td>
                    <input type="number" min="0" required name="beli">
                    <input type="hidden" name="totalbarang" value="<?php echo $row['total_barang_terjual']; ?>">
                    <button class="btn-beli">Beli</button></td>
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
</html>
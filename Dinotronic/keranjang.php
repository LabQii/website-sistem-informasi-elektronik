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
          <i class='bi bi-person' ></i>
          <span class="link_name">Beranda</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php?page=beranda">Beranda</a></li>
        </ul>
      </li>
      <li>
      <li>
        <a href="index.php?page=produk">
          <i class="bi bi-truck"></i>
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
          <i class="bi bi-receipt"></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php?page=history">History</a></li>
        </ul>
      </li>
    </li>
    <li>
        <a href="logpem.php">
          <i class="bi bi-trash"></i>
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
      <span class="text">Dinotronic 'Toko Elektronik Terpercaya'</span>
      <button class="btn btn-danger ml-auto" style="margin-left: auto;" onclick="location.href='./login/login_form.php'">Log Out</button>
    </div>
  </div>
    <div id="main-body">   

    <style type="text/css">
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
    </script>
    <!-- Content -->
    <div class="content" >
      <div class="data1">
        <div class="container">
          <div class="col-md-12" >
            <h3>Data Pembelian</h3>
            <table class="table table-striped" border=""> 
              <thead>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Beli Barang</th>
              </thead>
              <tbody>
              
                <?php
                    $db = $conn;
                    $tableName = "view_keranjang";
                    $columns= ['id_barang', 'nama_barang','harga_barang','stok','total_barang_terjual'];
                    $fetchData = fetch_data($db, $tableName, $columns);

                    function fetch_data($db, $tableName, $columns){
                      if(empty($db)) {
                          $msg= "Kesalahan koneksi basis data";
                      } elseif (empty($columns) || !is_array($columns)) {
                          $msg="Kolom Nama harus didefinisikan dalam array yang diindeks";
                      } elseif(empty($tableName)){
                          $msg= "Nama Tabel kosong";
                      } else{
                        $columnName = implode(", ", $columns);
                        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id_barang ASC";
                        $result = $db->query($query);

                        if ($result == true) {
                          $row_count = $result->rowCount();
                          if ($row_count > 0) {
                              $row = $result->fetchAll(PDO::FETCH_ASSOC);
                              $msg = $row;
                          } else {
                              $msg = "Tidak ada data ditemukan";
                          }
                          } else {
                                $msg = $db->errorInfo();
                          }
                            
                      }
                      return $msg;
                    }

                    if(is_array($fetchData)){      
                        $sn=1;
                        foreach($fetchData as $data){
                  ?>  
                    <tr>
                    <td><input type="hidden" name="id_barang" value="<?php echo $data["id_barang"]; ?>"><?php echo $data['id_barang']; ?></td>
                    <td><input type="hidden" name="nama_barang" value="<?php echo $data["nama_barang"]; ?>"><?php echo $data['nama_barang']??''; ?></td>
                    <td><input type="hidden" name="harga_barang" value="<?php echo $data["harga_barang"]; ?>"><?php echo $data['harga_barang']??''; ?></td>
                    <td><input type="hidden" name="stok" value="<?php echo $data["stok"]; ?>"><?php echo $data['stok']??''; ?></td>
                    <td>
                      <a href="buybarang.php?id=<?php echo $data['id_barang']; ?>">
                        <button class="btn-beli">Beli</button>
                      </a>
                    </td>
                    </tr>
                  <?php
                        $sn++;
                      }

                    } else{ 
                  ?>
                  <tr><td colspan="4"><?php echo $fetchData; ?></td></tr>
                  <?php } ?>
              </tbody>
            </table>
            <button class="btn-primary" onclick="window.history.back()" style="border-radius: 6px;">Kembali ke halaman sebelumnya ~></button>
          </div>
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
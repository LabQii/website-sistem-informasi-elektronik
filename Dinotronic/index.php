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
    <i class="bx bx-menu"></i>
    <span class="text">Dinotronic 'Toko Elektronik Terpercaya'</span>
    <button class="btn btn-danger ml-auto" style="margin-left: auto;" onclick="location.href='./login/login_form.php'">Log Out</button>
  </div>
  
</div>

    <div id="main-body">

      <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];
       
          switch ($page) {
            case 'beranda':
              include "beranda.php";
              break;
            case 'produk':
              include "data_brg.php";
              break; 
            case 'history':
              include "pembayaran.php";
              break;
              case 'updatebrg':
              include "updatebrg.php";
              break;
              case 'tambahbrg1':
              include "tambahbrg1.php";
              break; 

            // case 'historylogin':
            //   include "loglog.php";
            //   break;  

            case 'historyhps':
              include "logpem.php";
              break;    

            default:
              echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
              break;
          }
        } else{
          include "beranda.php";
        }
       
         ?>
 
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
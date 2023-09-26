<!-- <?php
$servername = "localhost"; // nama server database
$username = "root"; // nama pengguna database
$password = ""; // kata sandi database
$dbname = "db_elektronik"; // nama database

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?> -->

<?php

try {
  $conn = new PDO("mysql:host=localhost;dbname=db_elektronik","root","");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
  print "Koneksi atau query bermasalah" . $e->getMessage() . "</br>";
  die();
}

 ?>
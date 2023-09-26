<?php
   	include('koneksi.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<body>

<?php
    $idbarang1 = $_POST['idbarang'];
    $namabarang1 = $_POST['namabarang'];
    $hargabarang1 = $_POST['hargabarang'];
    $stokbarang1 = $_POST['stokbarang'];
    $beli1 = $_POST['beli'];
    $totalbarang1 = $_POST['totalbarang'];
    $totalbarangbaru = $totalbarang1 + $beli1;
    $stokbarangbaru = $stokbarang1 - $beli1;
    $totalhargabaru = $beli1 * $hargabarang1;
    

    if ($beli1 <= 0) {
      echo "<script type='text/javascript'>
              alert('Jumlah pembelian tidak valid!');
              window.location = 'keranjang.php';
            </script>";
    } else if ($beli1 > $stokbarang1) {
      echo "<script type='text/javascript'>
              alert('Stok barang tidak mencukupi!');
              window.location = 'keranjang.php';
            </script>";
    } else {
        $query = 'CALL UpdateDataBarang(:stokbarangbaru, :totalbarangbaru, :idbarang1)';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':stokbarangbaru', $stokbarangbaru);
        $stmt->bindParam(':totalbarangbaru', $totalbarangbaru);
        $stmt->bindParam(':idbarang1', $idbarang1);
        $result = $stmt->execute();
          
        $query2 = 'CALL InsertDataPembayaran(:idbarang1, :namabarang1, :hargabarang1, :beli1, :totalhargabaru)';
        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(':idbarang1', $idbarang1);
        $stmt2->bindParam(':namabarang1', $namabarang1);
        $stmt2->bindParam(':hargabarang1', $hargabarang1);
        $stmt2->bindParam(':beli1', $beli1);
        $stmt2->bindParam(':totalhargabaru', $totalhargabaru);
        $result2 = $stmt2->execute();
    
        echo "<script type='text/javascript'>
                alert('Pembelian Sukses!');
                window.location = 'keranjang.php';
              </script>";
    }
    
?>

</body>
</html>
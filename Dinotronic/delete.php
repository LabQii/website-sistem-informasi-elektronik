<?php
    include('koneksi.php');
    $data = $_GET["id_barang"];
?>

<script type="text/javascript">
    var deleteConfirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (deleteConfirmation) {
        window.location.href = "delete.php?id_barang=<?php echo $data ?>";
		window.location.href = "index.php?page=produk";
    } else {
        window.location.href = "index.php?page=produk";
    }
</script>

<?php
    // kode berikut akan dieksekusi jika pengguna menekan tombol "OK" pada konfirmasi
    $delete = $conn->prepare("DELETE FROM data_barang WHERE id_barang = :id_barang");
    $delete->bindParam(':id_barang', $data);
    if ($delete->execute()) {
        echo '<script language="javascript">alert("Data berhasil dihapus!"); window.location.href="index.php?page=produk";</script>';
    } else {
        // Gagal menghapus data
    }
?>

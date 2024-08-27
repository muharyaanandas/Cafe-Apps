<?php
$id = $_GET["id"];
require "../config.php";

$hapus = sql("DELETE FROM user WHERE id_user='$id'");
if ($hapus) {
    echo "
        <script>
        alert('Pelanggan berhasil dihapus');
        document.location.href='daftar_pelanggan.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Gagal menghapus pelanggan');
        document.location.href='daftar_pelanggan.php';
        </script>
        ";
}
?>

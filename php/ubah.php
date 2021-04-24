<?php
require 'function.php';
$id = $_GET['id'];
$Hijab = query("SELECT * FROM hijab WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil diubah!');
        document.location.href='admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal diubah!');
        document.location.href='admin.php';
        </script>";
    }
}
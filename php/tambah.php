<?php
require 'function.php';
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil ditambahkan!');
        document.location.href='admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal ditambahkan :(!');
        document.location.href='admin.php';
        </script>";
    }
}
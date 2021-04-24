<?php
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Registrasi Berhasil');
        document.location.href='login.php';
        </script>";
    } else {
        echo "<script>
        alert('Registrasi Gagal :(');
        </script>";
    }
}
//
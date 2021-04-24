<?php
session_start();
require 'function.php';
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit;
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
    if (mysqli_num_rows($cek_user) > 0) {
        $row = mysqli_fetch_assoc($cek_user);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['hash'] = hash('sha256', $row['id'], false);
        }
        if (hash('sha256', $row['id']) == $_SESSION['hash']) {
            header("Location: admin.php");
            die;
        }
        header("Location: ../index.php");
    }
}
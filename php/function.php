<?php
function koneksi()
{
    $dbTest = "testing";
    $dbProd = "pw_tubes_203040012";
    $conn = mysqli_connect("localhost", "root", "root", $dbTest);
    return $conn;
}

function getDetail($id)
{
    $conn = koneksi();
    $res = mysqli_query($conn, "SELECT * FROM `movies` WHERE id = $id");
    return mysqli_fetch_object($res);
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    $conn = koneksi();

    $nama = htmlspecialchars($data['nama']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $genre = htmlspecialchars($data['genre']);
    $harga = htmlspecialchars($data['harga']);
    $gambar = htmlspecialchars($data['img']);

    $query = "INSERT INTO movies VALUES
                ('','$gambar','$nama','$deskripsi','$genre','$harga')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM movies WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $genre = htmlspecialchars($data['genre']);
    $harga = htmlspecialchars($data['harga']);
    $gambar = htmlspecialchars($data['img']);

    $query = "UPDATE movies SET
                img='$gambar',
                nama='$nama',
                deskripsi='$deskripsi',
                genre='$genre',
                harga='$harga'
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function login(array $credentials)
{
    $conn = koneksi();
    $username = strtolower(stripslashes($credentials['username']));
    $password = hash('sha256', $credentials['password']);
    $result = mysqli_query($conn, "SELECT * FROM user WHERE `username` = '$username' AND `password`=$password");
    return $result ? mysqli_fetch_object($result) : $result;
}

function register($data)
{
    $conn = koneksi();
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah di gunakan');
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query_tambah = "INSERT INTO user VALUES ('','$username','$password')";
    mysqli_query($conn, $query_tambah);
    return mysqli_affected_rows($conn);
}
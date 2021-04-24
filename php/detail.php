<?php
if (!isset($_GET['id'])) {
    header("location: /");
    exit;
}
require '../php/function.php';
$id = $_GET["id"];
$Film = query("SELECT * FROM movies WHERE id = $id")[0];
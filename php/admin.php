<?php
require 'function.php';
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $Film = query(
        "SELECT * FROM movies WHERE
        nama LIKE '%$keyword%' OR
        deskripsi LIKE '%$keyword%' OR
        genre LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'
        "
    );
} else {
    $Film = query("SELECT * FROM movies");
}
?>

<?php if (empty($Film)): ?>
<!-- <tr>
                <th colspan="7">Data tidak di temukan</th>
            </tr> -->
<?php else: ?>

<?php $i = 1;
foreach ($Film as $movie):
?>


<?php
$i++;
endforeach;
?>

<?php endif;?>
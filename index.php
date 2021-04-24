<?php
require 'php/function.php';
$Film = query("SELECT * FROM movies");
?>


<?php
foreach ($Film as $movie):
?>

<?php endforeach;?>
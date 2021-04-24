<?php

require __DIR__ . '/php/function.php';

if (!isset($_GET['id'])) {
    header('location: /');
    exit;
}

$movie = getDetail($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie->nama; ?> | Movies - ID</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php include __DIR__.'/php/navigation.php'; ?>

    <main class="container bg-white px-2 py-4 mt-4 mx-auto">
        <h5 class="text-gray-900 font-semibold text-lg">Movie: <?php echo $movie->nama; ?></h5>
        <div class="flex mt-2 md:flex-row flex-col">
            <img src="/assets/img/<?php echo $movie->img; ?>" alt="Cover <?php echo $movie->nama; ?>" class="max-h-80 mx-auto md:mx-0">
            <div class="block ml-3">
                <div class="flex flex-col md:flex-row w-full">
                    <label class="font-semibold md:w-2/12">Movie Name:</label>
                    <span class="md:w-10/12"><?php echo $movie->nama; ?></span>
                </div>
                <div class="flex flex-col md:flex-row w-full">
                    <label class="font-semibold md:w-2/12">Movie Genre:</label>
                    <span class="md:w-10/12"><?php echo $movie->genre; ?></span>
                </div>
                <div class="flex flex-col md:flex-row w-full">
                    <label class="font-semibold md:w-2/12">Price (IDR):</label>
                    <span class="md:w-10/12">IDR. <?php echo number_format($movie->harga, 2); ?></span>
                </div>
                <div class="flex flex-col md:flex-row w-full">
                    <label class="font-semibold md:w-2/12">Movie Description:</label>
                    <p class="md:w-10/12"><?php echo $movie->deskripsi; ?></p>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
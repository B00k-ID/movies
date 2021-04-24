<?php
require 'php/function.php';
$movies = query("SELECT * FROM movies");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies - ID</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php include __DIR__.'/php/navigation.php'; ?>

    <main class="container bg-white px-2 py-4 mt-4 mx-auto">
        <h5 class="text-gray-900 font-semibold text-lg">Movies</h5>
        <div class="grid grid-cols-2 md:grid-cols-12 gap-3">
            <?php
                foreach($movies as $movie):
            ?>
                <div class="flex flex-col w-40 col-span-2">
                    <div class="relative">
                        <span class="bg-blue-600 text-xs tracking-widest uppercase rounded-md text-center text-white absolute top-2 right-2 px-1 py-1 select-none"><?php echo $movie['genre']; ?></span>
                        <span class="bg-green-600 text-xs tracking-widest rounded-md text-center text-white absolute bottom-2 left-2 px-1 py-1 select-none">IDR. <?php echo number_format($movie['harga'], 2); ?></span>
                        <img src="/assets/img/<?php echo $movie['img'] ?>" alt="<?php echo "Movie: $movie[nama]"; ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="px-2 py-2 w-full bg-white">
                        <a href="/detail.php?id=<?php echo $movie['id']; ?>" class="font-semibold text-base text-gray-900 hover:text-indigo-500 transition duration-200 ease-in-out"><?php echo $movie['nama']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    
</body>

</html>
<?php
session_start();

require __DIR__ . '/php/function.php';

isset($_SESSION['username']) ? header('location: /admin.php') : '';

if(!isset($_GET['action']) && !isset($_GET['form'])) {
    header('location: /auth.php?form=login');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - Movies - ID</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <main>
        <div class="flex w-full min-h-screen items-center justify-center">
            <div class="w-10/12 md:w-96">
                <h3 class="text-gray-900 font-bold text-2xl mb-2 text-center">MoviesID</h3>
                <div class="bg-white px-3 py-3 shadow-md">
                    <?php if(isset($_GET['form']) && $_GET['form'] === 'login'): ?>
                        <h5 class="text-gray-900 font-bold text-lg text-center">Login</h5>
                    <?php endif; ?>
                    <?php if(isset($_GET['form']) && $_GET['form'] === 'register'): ?>
                        <h5 class="text-gray-900 font-bold text-lg text-center">Register</h5>
                    <?php endif; ?>
                    <form action="/auth.php?action=<?php echo $_GET['form'] ?>" method="post">
                        <div class="flex flex-col">
                            <label for="username" class="font-semibold">Username</label>
                            <input type="text" name="username" autofocus required id="username" class="w-full px-3 py-1 h-8 text-sm border border-gray-300 rounded-lg outline-none focus:outline-none focus:border-blue-400 transition duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-col">
                            <label for="password" class="font-semibold">Password</label>
                            <input type="password" name="password" required id="password" class="w-full px-3 py-1 h-8 text-sm border border-gray-300 rounded-lg outline-none focus:outline-none focus:border-blue-400 transition duration-200 ease-in-out">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-xs tracking-widest rounded-md outline-none focus:outline-none focus:bg-blue-700 text-white uppercase mt-2 ml-auto transition duration-200 ease-in-out">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<?php

if(isset($_GET['action'])) {
    $act = $_GET['action'];
    
    $credentials = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ];

    echo "<pre>";
    print_r($credentials);
    echo "</pre>";
    $act($credentials);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Overzicht gebruikers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        label {
            display:block
        }
    </style>
</head>
<body class="bg-green-200 w-full">
<header class="bg-green-200 w-full">

    <?php

    require('../php/dbConnection.php');
    require('../php/permissions/directiePermission.php');

    if (empty($_SESSION['user']) || $_SESSION['user']['account_type'] != 1) {
        header('location: index.php');
    }

    $query = $dbConnection->query('SELECT user_id, username, account_type FROM users');
    $users = [];
    while($row = mysqli_fetch_array($query))
    {
        $users[] = $row;
    }
    ?>
    <!-- Nav Bar met een zoekbalk -->
    <nav class="bg-green-200 text-white flex flex-col sm:flex-row justify-between items-center py-3 px-5">
        <div class="flex items-center">
            <h1 class="text-2xl sm:text-xl font-bold text-green-500">Maaskantje</h1>
            <a href="../php/homepage.php" class="text-lg sm:text-base text-green-500 font-bold py-2 px-5 rounded hover:underline">
                Home
            </a>

        </div>


        <div class="flex items-center space-x-5 mt-4 sm:mt-0">
            <a href="#"><i class="uil uil-user text-green-500 text-xl hover:underline"></i></a>
            <h2 class="text-green-500 rounded py-3 px-5"><?php echo $_SESSION['user']['username'] ?></h2>
        </div>
    </nav>
</header>

<div class="m-8">

    <?php

    if (!empty($_SESSION['error'])) {
        echo "<div class='bg-red-500 w-96 m-auto my-4 p-2 rounded text-white'>
            <p>" . $_SESSION['error'] . "</p>
        </div>";
    }

    $_SESSION['error'] = null;

    ?>

    <div class="flex items-center justify-between mx-4">
        <p class="text-xl">Overzicht gebruikers</p>
        <a href="./" class="bg-gray-200 hover:bg-gray-100 border rounded p-2 text-gray-500">Terug</a>
    </div>

    <div class="m-4">
        <form method="post" action="../php/createUserHandler.php">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Gebruikersnaam</label>
                    <input type="text" name="username" class="border rounded w-full p-1" />
                </div>
                <div>
                    <label>Wachtwoord</label>
                    <input type="password" name="password" class="border rounded w-full p-1" />
                </div>
                <div class="col-span-2">
                    <label class="p-1">
                        <input type="radio" name="account_type" value="1" id="1" />
                        Directie
                    </label>
                    <label class="p-1">
                        <input type="radio" name="account_type" value="2" id="2" />
                        Magazijnmedewerker
                    </label>
                    <label class="p-1">
                        <input type="radio" name="account_type" value="3" id="3" checked />
                        Vrijwilliger
                    </label>
                </div>
            </div>
            <button class="bg-green-500 hover:bg-green-400 p-2 rounded text-white block ml-auto mt-4">Opslaan</button>
        </form>
    </div>
</div>
</body>
</html>
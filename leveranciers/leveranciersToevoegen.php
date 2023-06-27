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
        <form class="mt-4" method="post" action="../php/createLeverancierHandler.php">
            <input id="id" name="id" type="hidden" />
            <div class="grid grid-cols-2 gap-4">
                <label class="block">
                    Bedrijfsnaam:
                    <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" class="border rounded w-full p-1"/>
                </label>
                <label class="block">
                    Adres:
                    <input type="text" id="adres" name="adres" class="border rounded w-full p-1" />
                </label>
            </div>
            <div class="mt-4">
                <p class="border-b">Contactpersoon</p>
                <div class="grid grid-cols-3 mt-4 gap-4">
                    <label class="block">
                        Naam:
                        <input type="text" id="naam" name="naam" class="border rounded w-full p-1" />
                    </label>
                    <label class="block">
                        E-mail:
                        <input type="text" id="email" name="email" class="border rounded w-full p-1" />
                    </label>
                    <label class="block">
                        Telefoonnummer:
                        <input type="text" id="telefoonnummer" name="telefoonnummer" class="border rounded w-full p-1" />
                    </label>
                    <label class="col-span-3 block">
                        Volgende levering:
                        <input type="date" name="volgende_levering" class="border rounded block w-full" />
                    </label>
                </div>
            </div>
            <button class="bg-green-500 hover:bg-green-400 p-2 rounded text-white block ml-auto mt-4">Opslaan</button>
        </form>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Overzicht gebruikers</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
   <!-- Navbar -->
  <div class="flex items-center h-20">
    <!-- Navbar Container -->
    <div class="mx-auto relative px-5 max-w-screen-xl w-full flex flex-wrap items-center justify-end">
      <!-- Navbar Logo -->
      <div class="absolute left-0 flex flex-row">
        <img class="h-10 hidden md:inline-block" src="../img/imghome/Logo.png" alt="het logo van voedselbank maaskantje">
        <div class="text-3xl font-light uppercase ml-2">
          <span class="hidden md:inline-block">Maaskantje</span>
        </div>
      </div>

      <!-- Navbar Menu -->
      <nav class="flex flex-row gap-5">
        <a href="Homepage.php">Home</a>
        <a href="../php/overzichtproduct.php">Productvoorraad</a>
        <a href="../leveranciers/index.php">Leveranciers</a>
        <a href="../php/overzichtklant.php">klanten</a>
        <a href="../gebruikers/index.php">Gebruikers</a>
        <a class=" px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors  rounded" href="#">Log in</a>
      </nav>
    </div>
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

    <div class="flex items-center justify-between">
        <p class="text-xl">Overzicht gebruikers</p>
        <a href="gebruikerToevoegen.php"
           class="bg-green-500 hover:bg-green-400 border rounded p-2 text-white">Gebruiker toevoegen</a>
    </div>
    <table class="w-full mt-4">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
        <tr>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Id</th>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Gebruiker</th>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Account type</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        <?php foreach ($users as $user): ?>
        <tr class="hover:bg-gray-100">
            <td class="p-3">
                <?php echo $user['user_id'] ?>
            </td>
            <td class="p-3">
                <?php echo $user['username'] ?>
            </td>
            <td class="p-3">
                <?php
                switch ($user['account_type']) {
                    case 1:
                        echo 'Directie';
                        break;
                    case 2:
                        echo 'Magazijnmedewerker';
                        break;
                    case 3:
                        echo 'Vrijwilliger';
                        break;
                }
                ?>
            </td>
            <td class="text-right space-x-4 p-3">
                <button class="p-1 rounded hover:bg-orange-500 hover:text-white"
                        onclick="openEditUser(<?php echo $user['user_id'] ?>)">Bewerken</button>
                <button class="p-1 rounded hover:bg-red-500 hover:text-white <?php if ($user['user_id'] === $_SESSION['user']['user_id']) { echo 'hidden'; } ?>"
                        onclick="deleteUser(<?php echo $user['user_id'] ?>)">Verwijderen</button>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<div style="display: none" class="h-screen w-screen bg-black/50 z-10 flex items-center justify-center fixed top-0 left-0" id="modal">
    <div class="rounded bg-white shadow-lg p-6 relative">
        <p class="absolute top-4 right-4 cursor-pointer" onclick="closeEditUser()">X</p>
        <p id="title" class="text-xl font-bold"></p>
        <form class="mt-4" method="post" action="../php/editUserHandler">
            <input id="id" name="id" type="hidden" />
            <label class="block">
                Gebruikersnaam:
            </label>
            <input type="text" id="username" name="username" class="border rounded w-full p-1"/>
            <div class="mt-4">
                <p>Accounttype</p>
                <div class="mt-1">
                    <label class="border-r p-1">
                        <input type="radio" name="account_type" value="1" id="1" />
                        Directie
                    </label>
                    <label class="p-1">
                        <input type="radio" name="account_type" value="2" id="2" />
                        Magazijnmedewerker
                    </label>
                    <label class="border-l p-1">
                        <input type="radio" name="account_type" value="3" id="3" />
                        Vrijwilliger
                    </label>
                </div>
            </div>
            <button class="bg-green-500 hover:bg-green-400 p-2 rounded text-white block ml-auto mt-4">Opslaan</button>
        </form>
    </div>
</div>

<script>

    let currentUser = null
    const users = [
        <?php foreach($users as $user) {
            echo "{
            id: '". $user["user_id"] ."',
            username: '" . $user["username"] . "',
            account_type: '" . $user["account_type"] . "'
            },";
        } ?>
    ]

    function deleteUser(id) {
        const response = confirm('Weet u zeker dat u dit wilt verwijderen')
        if (response) {
            window.location = '../php/removeUserHandler?id=' + id
        }
    }
    function openEditUser(user) {
        currentUser = users.find(item => item.id == user)

        document.getElementById('id').value = currentUser.id
        document.getElementById('title').innerHTML = currentUser.username + ' bewerken'
        document.getElementById('username').value = currentUser.username
        document.getElementById(currentUser.account_type).checked = true

        document.getElementById('modal').style.display = ""
    }
    function closeEditUser() {
        currentUser = null
        document.getElementById('modal').style.display = 'none'
    }
</script>
</body>
</html>
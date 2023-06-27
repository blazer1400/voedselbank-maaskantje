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

    $query = $dbConnection->query('SELECT * from leveranciers');
    $leveranciers = [];
    while($row = mysqli_fetch_array($query))
    {
        $leveranciers[] = $row;
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
        <p class="text-xl">Overzicht leveranciers</p>
        <a href="leveranciersToevoegen.php"
           class="bg-green-500 hover:bg-green-400 border rounded p-2 text-white">Leverancier toevoegen</a>
    </div>
    <table class="w-full mt-4">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
        <tr>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Id</th>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Bedrijfsnaam</th>
            <th class="p-3 text-sm font-semibold tracking-wide text-left">Volgende levering</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        <?php foreach ($leveranciers as $leverancier): ?>
            <tr class="hover:bg-gray-100">
                <td class="p-3">
                    <?php echo $leverancier['idleveranciers'] ?>
                </td>
                <td class="p-3">
                    <?php echo $leverancier['bedrijfsnaam'] ?>
                </td>
                <td class="p-3">
                    <input type="date" value="<?php echo $leverancier['volgende_levering'] ?>" id="date_<?php echo $leverancier['idleveranciers'] ?>"
                           onchange="editLeveringDate(<?php echo $leverancier['idleveranciers'] ?>)" />
                </td>
                <td class="text-right space-x-4 p-3">
                    <button class="p-1 rounded hover:bg-orange-500 hover:text-white"
                            onclick="openEditUser(<?php echo $leverancier['idleveranciers'] ?>)">Bewerken</button>
                    <button class="p-1 rounded hover:bg-red-500 hover:text-white"
                            onclick="deleteUser(<?php echo $leverancier['idleveranciers'] ?>)">Verwijderen</button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<div style="display: none" class="h-screen w-screen bg-black/50 z-10 flex items-center justify-center fixed top-0 left-0" id="modal">
    <div class="rounded bg-white shadow-lg p-6 relative w-[80%]">
        <p class="absolute top-4 right-4 cursor-pointer" onclick="closeEditUser()">X</p>
        <p id="title" class="text-xl font-bold"></p>
        <form class="mt-4" method="post" action="../php/editLeveranciersHandler">
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
                </div>
            </div>
            <button class="bg-green-500 hover:bg-green-400 p-2 rounded text-white block ml-auto mt-4">Opslaan</button>
        </form>
    </div>
</div>

<script>

    let currentUser = null
    const users = [
        <?php foreach($leveranciers as $leverancier) {
        echo "{
            id: '". $leverancier['idleveranciers'] ."',
            bedrijfsnaam: '" . $leverancier['bedrijfsnaam'] . "',
            adres: '" . $leverancier['adres'] . "',
            naam: '" . $leverancier['naam'] . "',
            email: '" . $leverancier['email'] . "',
            telefoonnummer: '" . $leverancier['telefoonnummer'] . "',
            volgende_levering: '" . $leverancier['volgende_levering'] . "'
            },";
    } ?>
    ]

    function deleteUser(id) {
        const response = confirm('Weet u zeker dat u dit wilt verwijderen')
        if (response) {
            window.location = '../php/removeLeverancierHandler?id=' + id
        }
    }
    function openEditUser(user) {
        currentUser = users.find(item => item.id == user)

        document.getElementById('id').value = currentUser.id
        document.getElementById('title').innerHTML = currentUser.bedrijfsnaam + ' bewerken'
        document.getElementById('bedrijfsnaam').value = currentUser.bedrijfsnaam
        document.getElementById('adres').value = currentUser.adres
        document.getElementById('naam').value = currentUser.naam
        document.getElementById('email').value = currentUser.email
        document.getElementById('telefoonnummer').value = currentUser.telefoonnummer

        document.getElementById('modal').style.display = ""
    }
    function closeEditUser() {
        currentUser = null
        document.getElementById('modal').style.display = 'none'
    }
    function editLeveringDate(id) {
        window.location.replace('../php/updateLeveranciersdate?id=' + id + '&date=' + document.getElementById('date_' + id).value)
    }
</script>
</body>
</html>
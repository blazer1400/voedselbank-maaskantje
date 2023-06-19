<?php
        // zorgt voor conncectie voor de database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maaskantje123";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // haalt informatie uit de database
          $stmt = $conn->prepare("SELECT * FROM klanten");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


           // sluit de database connectie
           $conn = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beheer van klanten</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="../img/imghome/Logo.png">
</head>
<body class="bg-green-200 h-full">
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
        <a href="overzichtproduct.php">Productvoorraad</a>
        <a href="#">Leveranciers</a>
        <a href="overzichtklant.php">klanten</a>
        <a class=" px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors  rounded" href="#">Log in</a>
      </nav>
    </div>
  </div>
  
  <div class="flex items-center justify-end mr-80 mb-4 mb-3">
    <button class="bg-green-800 border border-green-800 rounded px-3 py-2 hover:bg-green-500 hover:border-green-500">
      <a href="../klanten/addklant.php" class="text-white font-mono">+ Klant</a>
    </button>
  </div>

  <div class="flex justify-center items-start h-screen">
    <div class="p-5">
      <div class="overflow-auto rounded-lg shadow hidden md:block">
        <table class="w-full">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Naam</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Adres</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Telefoonnummer</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">E-mail</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Wensen</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">volwassen</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Kinderen</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Baby's</th>
            </tr>
          </thead>
          <tbody>
            <?php
    

              // zorgt ervoor dat je de data zit in de table
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td class='p-3'>" . $row['gezinsnaam'] . "</td>";
                echo "<td class='p-3'>" . $row['adres'] . "</td>";
                echo "<td class='p-3'>" . $row['telefoonnummer'] . "</td>";
                echo "<td class='p-3'>" . $row['email'] . "</td>";
                echo "<td class='p-3'>" . $row['wensen'] . "</td>";
                echo "<td class='p-3'>" . $row['volwassen'] . "</td>";
                echo "<td class='p-3'>" . $row['tieners'] . "</td>";
                echo "<td class='p-3'>" . $row['babys'] . "</td>";
                echo "</tr>";
              }
            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }

           
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
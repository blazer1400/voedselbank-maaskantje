<?php
// Databasereferenties
$host = 'localhost';
$dbName = 'maaskantje123';
$username = 'root';
$password = '';

// Geef de categorie op om te filteren
$category = 'pasta'; // Wijzig dit in de gewenste categorie

// Definieer een variabele voor de zoekopdracht
$search = '';

if (isset($_GET['search'])) {
  $search = $_GET['search'];
}

try {
  // Maak een nieuwe PDO-instantie aan
  $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

  // Stel de PDO-fout 
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Gegevens ophalen uit de database op categorie en zoekopdracht
  $stmt = $db->prepare("SELECT `EAN Nummer`, `Aantal producten`, `Omschrijving`, `Productnaam`, `categorie` FROM `productvoorraad` WHERE `categorie` = :category AND (`EAN Nummer` LIKE :search OR `Productnaam` LIKE :search)");
  $stmt->bindValue(':category', $category);
  $stmt->bindValue(':search', "%$search%");
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // Als er een fout is opgetreden in de verbinding of databasebewerking.
  echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= ucfirst($category); ?> products</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<header class="bg-green-200 w-full">
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
    <div class="flex items-center flex-grow sm:flex-initial sm:ml-5 space-x-0 mt-4 sm:mt-0 flex-1 mr-20">
      <form method="GET" action="">
        <div class="flex justify-center">
          <input type="text" name="search" placeholder="Zoek EAN..." class="px-4 py-2 border border-gray-300 rounded-l text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" value="<?= $search ?>">
          <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-l-none rounded-r">Zoek</button>
        </div>
      </form>
    </div>
    </header>
<body class="bg-green-200 w-full h-screen">
 
  <div class="flex justify-center items-start h-screen">
    <div class="p-5">
      <h1 class="text-xl mb-2"><?= ucfirst($category); ?></h1>
      <div class="overflow-auto rounded-lg shadow hidden md:block">
        <table class="w-full">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">update</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Streepjescode</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Aantal producten</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Product omschrijving</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Productnaam</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <?php if (!empty($products)): ?>
              <?php foreach ($products as $product): ?>
                <tr class="bg-white hover:bg-gray-100 cursor-pointer" onclick="window.location.href = '../productvoorraad/updateproduct.php?id=<?= $product['EAN Nummer']; ?>'">
                  <td class="w-16 p-3 text-sm text-gray-700 whitespace-nowrap">
                    <a href="../productvoorraad/updateproduct.php?id=<?= $product['EAN Nummer']; ?>">
                      Update
                    </a>
                  </td>
                  <td class="w-24 p-3 text-sm text-gray-700 whitespace-nowrap">
                    <a href="#" class="font-bold text-blue-500"><?= $product['EAN Nummer']; ?></a>
                  </td>
                  <td class="w-30 p-3 text-sm text-gray-700 whitespace-nowrap"><?= $product['Aantal producten']; ?></td>
                  <td class="w-42 p-3 text-sm text-gray-700 whitespace-nowrap"><?= $product['Omschrijving']; ?></td>
                  <td class="w-24 p-3 text-sm text-gray-700 whitespace-nowrap"><?= $product['Productnaam']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="p-3 text-sm text-gray-700">Geen producten gevonden.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
        <?php foreach ($products as $product): ?>
          <div class="bg-white space-y-3 p-4 rounded-lg shadow">
            <div class="flex items-center space-x-2 text-sm">
              <div class="text-sm font-medium text-black">
                <a href="../productvoorraad/updateproduct.php?id=<?= $product['EAN Nummer']; ?>" class="text-green-500 hover:underline">
                  Update
                </a>
              </div>
              <div class="text-gray-500"><?= $product['Aantal producten']; ?></div>
              <div class="text-sm text-gray-500"><?= $product['Omschrijving']; ?></div>
              <div class="text-sm font-medium text-black"><?= $product['Productnaam']; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>
</html>
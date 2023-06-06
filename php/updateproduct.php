<?php
// Databasereferenties
$host = 'localhost';
$dbName = 'maaskantje';
$username = 'root';
$password = '';

try {
  // Maak een nieuwe PDO-instantie aan
  $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

  // Stel de PDO-fout
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Controleer of het formulier is ingediend
  if (isset($_POST['update'])) {
    // Haal de waarden op uit het formulier
    $ean = $_POST['EAN'];
    $aantal = $_POST['aantal_producten'];
    $omschrijving = $_POST['omschrijving'];
    $categorie = $_POST['categorie'];
    $productnaam = $_POST['productnaam'];

    // Bereid de SQL-query voor met parameterbindings
    $query = "UPDATE `productvoorraad` SET `Aantal producten` = :aantal, `Omschrijving` = :omschrijving, `categorie` = :categorie, `Productnaam` = :productnaam WHERE `EAN Nummer` = :ean";
    $stmt = $db->prepare($query);

    // Bind de parameterwaarden aan de query
    $stmt->bindParam(':ean', $ean);
    $stmt->bindParam(':aantal', $aantal);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':productnaam', $productnaam);

    // Voer de query uit
    $stmt->execute();

    // Redirect naar een andere pagina na het updaten van het product
    header('Location: overzichtproduct.php');
    exit();
  }

  // Haal de productgegevens op uit de database
  $query = "SELECT `EAN Nummer`, `Aantal producten`, `Omschrijving`, `categorie`, `Productnaam` FROM `productvoorraad`";
  $stmt = $db->prepare($query);
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
  <title>Update product</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="bg-green-200 min-h-screen">
  <div class="flex justify-center items-center mt-20">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
      <?php foreach ($products as $product) { ?>
        <div class="mb-6">
          <label for="EAN" class="block text-gray-700 text-sm font-bold mb-2">EAN Nummer</label>
          <input type="number" name="EAN" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $product['EAN Nummer']; ?>">
        </div>
        <div class="mb-6">
          <label for="aantal_producten" class="block text-gray-700 text-sm font-bold mb-2">Hoeveelheid producten</label>
          <input type="number" name="aantal_producten" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $product['Aantal producten']; ?>">
        </div>
        <div class="mb-6">
          <label for="omschrijving" class="block text-gray-700 text-sm font-bold mb-2">Omschrijving</label>
          <textarea name="omschrijving" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500"><?php echo $product['Omschrijving']; ?></textarea>
        </div>
        <div class="mb-6">
          <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
          <select name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
            <option value="aardappel" <?php if ($product['categorie'] == 'aardappel') echo 'selected'; ?>>Aardappel, groente, fruit</option>
            <option value="kaas" <?php if ($product['categorie'] == 'kaas') echo 'selected'; ?>>Kaas, vleeswaren</option>
            <option value="zuivel" <?php if ($product['categorie'] == 'zuivel') echo 'selected'; ?>>Zuivel, plantaardige en eieren</option>
            <option value="bakkerij" <?php if ($product['categorie'] == 'bakkerij') echo 'selected'; ?>>Bakkerij en banket</option>
            <option value="frisdrank" <?php if ($product['categorie'] == 'frisdrank') echo 'selected'; ?>>Frisdrank, sappen, koffie, thee</option>
            <option value="pasta" <?php if ($product['categorie'] == 'pasta') echo 'selected'; ?>>Pasta, rijst en wereldkeuken</option>
            <option value="soepen" <?php if ($product['categorie'] == 'soepen') echo 'selected'; ?>>Soepen, sauzen, kruiden en olie</option>
            <option value="baby" <?php if ($product['categorie'] == 'baby') echo 'selected'; ?>>Baby, verzorging, hygiëne</option>
          </select>
        </div>
        <div class="mb-6">
          <label for="productnaam" class="block text-gray-700 text-sm font-bold mb-2">Productnaam</label>
          <input type="text" name="productnaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $product['Productnaam']; ?>">
        </div>
        <div class="flex items-center justify-center mt-6">
          <button type="submit" name="update" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
      <?php } ?>
    </form>
  </div>
</body>

</html>








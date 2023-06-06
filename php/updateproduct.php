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
  
    $productnaam = $_POST['productnaam'];

    // Bereid de SQL-query voor met parameterbindings
    $query = "UPDATE `productvoorraad` SET `Aantal producten` = :aantal, `Omschrijving` = :omschrijving, `Productnaam` = :productnaam WHERE `EAN Nummer` = :ean";
    $stmt = $db->prepare($query);

    // Bind de parameterwaarden aan de query
    $stmt->bindParam(':ean', $ean);
    $stmt->bindParam(':aantal', $aantal);
    $stmt->bindParam(':omschrijving', $omschrijving);
   
    $stmt->bindParam(':productnaam', $productnaam);

    // Voer de query uit
    $stmt->execute();

    // Redirect naar een andere pagina na het updaten van het product
    header('Location: overzichtproduct.php');
    exit();
  }

  // Haal de productgegevens op uit de database
  $ean = $_GET['id'];
  $query = "SELECT `EAN Nummer`, `Aantal producten`, `Omschrijving`, `Productnaam` FROM `productvoorraad` WHERE `EAN Nummer` = :ean";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':ean', $ean);
  $stmt->execute();
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
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
      <div class="mb-6">
        <label for="EAN" class="block text-gray-700 text-sm font-bold mb-2">EAN Nummer</label>
        <input type="number" name="EAN" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $product['EAN Nummer']; ?>" readonly>
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
        <label for="productnaam" class="block text-gray-700 text-sm font-bold mb-2">Productnaam</label>
        <input type="text" name="productnaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $product['Productnaam']; ?>">
      </div>
      <div class="flex items-center justify-center mt-6">
        <button type="submit" name="update" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
      </div>
    </form>
  </div>
</body>

</html>







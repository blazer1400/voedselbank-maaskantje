<?php
// Database c
$host = 'localhost';
$dbName = 'maaskantje123';
$username = 'root';
$password = '';

try {
  // maakt een nieuwe pdo
  $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

  // Stel de PDO-foutmodus in op uitzondering
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // geeft de data terug
    $ean = $_POST['EAN'];
    $amount = $_POST['aantal_producten'];
    $description = $_POST['omschrijving'];
    $category = $_POST['categorie'];
    $productName = $_POST['productnaam'];

    // zorgt voor de sql statement om producten toetevoegen
    $stmt = $db->prepare("INSERT INTO `productvoorraad` (`EAN Nummer`, `Productnaam`, `Omschrijving`, `Categorie`, `Aantal producten`) VALUES (:ean, :productName, :description, :category, :amount)");

    // bind de parameters
    $stmt->bindParam(':ean', $ean);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':productName', $productName);

    // zorgt ervoor dat hij de statement uitvoert
    $stmt->execute();

    // je gaat terug als deze pagina als alles goed is gegaan
    header("Location: ../php/overzichtproduct.php");
    exit;
  }
} catch (PDOException $e) {
  // als er iets mis is krijg je een error code
  echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add product</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-green-200 min-h-screen">
  <div class="flex justify-center items-center mt-20">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
      <div class="mb-6">
        <label for="EAN" class="block text-gray-700 text-sm font-bold mb-2">EAN Nummer</label>
        <input type="number" name="EAN" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-6">
        <label for="aantal_producten" class="block text-gray-700 text-sm font-bold mb-2">Hoeveelheid producten</label>
        <input type="number" name="aantal_producten" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="mb-6">
        <label for="omschrijving" class="block text-gray-700 text-sm font-bold mb-2">Omschrijving</label>
        <textarea name="omschrijving" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500"></textarea>
      </div>
      <div class="mb-6">
        <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
        <select name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
          <option value="aardappel">Aardappel, groente, fruit</option>
          <option value="kaas">Kaas, vleeswaren</option>
          <option value="zuivel">Zuivel, plantaardige en eieren</option>
          <option value="bakkerij">Bakkerij en banket</option>
          <option value="frisdrank">Frisdrank, sappen, koffie, thee</option>
          <option value="pasta">Pasta, rijst en wereldkeuken</option>
          <option value="snoep">Snoep, koek, chips, chocolade</option>
          <option value="soepen">Soepen, sauzen, kruiden en olie</option>
          <option value="baby">Baby, verzorging, hygiëne</option>
        </select>
      </div>
      <div class="mb-6">
        <label for="productnaam" class="block text-gray-700 text-sm font-bold mb-2">Productnaam</label>
        <input type="text" name="productnaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="flex justify-center">
        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Add product
        </button>
      </div>
    </form>
  </div>
</body>
</html>

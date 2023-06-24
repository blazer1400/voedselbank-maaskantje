<?php
// Verbinding maken met de database met behulp van PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maaskantje123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Verbindingsfout: " . $e->getMessage();
}

// Haal de geselecteerde categorie op uit het formulier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedCategory = $_POST['categorie'];

    // Query uitvoeren om de categoriegegevens op te halen uit de database
    $stmt = $conn->prepare("SELECT categorie FROM productvoorraad WHERE categorie = :categorie");
    $stmt->bindParam(':categorie', $selectedCategory);
    $stmt->execute();
    $categorieData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Verwerk het tweede formulier om de categorie naam bij te werken
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $newCategoryName = $_POST['categorie'];

    // Query uitvoeren om de categoriegegevens bij te werken in de database
    $stmt = $conn->prepare("UPDATE productvoorraad SET categorie = :newCategoryName WHERE categorie = :selectedCategory");
    $stmt->bindParam(':newCategoryName', $newCategoryName);
    $stmt->bindParam(':selectedCategory', $selectedCategory);
    $stmt->execute();

    // Terug naar de startpagina sturen of een bevestigingsbericht weergeven
    header("Location: overzichtproduct.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verander categorie</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-green-200 min-h-screen">
  <div class="flex justify-center items-center mt-20 flex-col">
    <form id="categoryForm" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
      <div class="mb-6">
        <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
        <select name="categorie" id="categorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
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
      <div class="flex justify-center">
        <button id="submitBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          kies een categorie
        </button>
      </div>
    </form>
    <div id="secondFormContainer" class="mt-4"></div>
  </div>

<footer>
<script>
    const form = document.getElementById('categoryForm');
    const secondFormContainer = document.getElementById('secondFormContainer');

    // Voeg een evenement toe aan het eerste formulier
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Voorkomt het standaardgedrag van het formulier bij indienen

      const category = document.getElementById('categorie').value;

      // Maak het tweede formulier op basis van de gekozen categorie
      const secondFormHTML = `
        <form id="secondForm" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
          <h2 class="text-center text-xl font-bold mb-6">Gekozen categorie: ${category}</h2>
          <div class="mb-6">
            <label for="fotocategorie" class="block text-gray-700 text-sm font-bold mb-2">Voeg een plaatje</label>
            <input type="file" name="fotocategorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
          </div>
          <div class="mb-6">
            <label for="categorie" class="block text-gray-700 text-sm font-bold mb-2">Categorie naam</label>
            <input type="text" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="${category}">
          </div>
          <div class="flex justify-center">
            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="update">
              Verander categorie
            </button>
          </div>
        </form>
      `;

      // Toon het tweede formulier
      secondFormContainer.innerHTML = secondFormHTML;
    });
  </script>
</footer>
</html>
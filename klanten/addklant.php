<?php
// Database connectie
$host = 'localhost';
$dbName = 'maaskantje123';
$username = 'root';
$password = '';

try {
  // Maakt een nieuwe PDO verbinding
  $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

  // Stel de PDO foutmodus in op uitzondering
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verzamel de data
    $gezinsnaam = $_POST['gezinsnaam'];
    $adres = $_POST['adres'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    // Verzamel de geselecteerde checkboxes voor wensen
    $geenvlees = isset($_POST['geenvlees']) ? $_POST['geenvlees'] : '';
    $veganistisch = isset($_POST['Veganistisch']) ? $_POST['Veganistisch'] : '';
    $vegetarisch = isset($_POST['vegatarisch']) ? $_POST['vegatarisch'] : '';
    $anders = isset($_POST['Anders']) ? $_POST['Anders'] : '';
    $andersTekst = isset($_POST['andersTekst']) ? $_POST['andersTekst'] : '';

    // Combineer de wensen in een enkele string
    $wensen = $geenvlees . ',' . $veganistisch . ',' . $vegetarisch;

    // Voeg de "Anders" wens toe als deze is geselecteerd
    if ($anders !== '') {
      $wensen .= ',' . $andersTekst;
    }

    $gezinssamenstelling = $_POST['gezinssamenstelling'];
    $volwassen = $_POST['volwassen'];
    $kinderen = ($gezinssamenstelling !== 'Alleenstaand' && $gezinssamenstelling !== 'Gezin zonder kinderen') ? $_POST['kinderen'] : 0;
    $baby = ($gezinssamenstelling !== 'Alleenstaand' && $gezinssamenstelling !== 'Gezin zonder kinderen') ? $_POST['baby'] : 0;

    // Bereid de SQL-query voor om klanten toe te voegen
    $stmt = $db->prepare("INSERT INTO `klanten`(`idklanten`, `gezinsnaam`, `adres`, `telefoonnummer`, `email`, `wensen`, `volwassen`, `tieners`, `babys`) VALUES (null,:gezinsnaam,:adres,:tel,:email,:wensen,:volwassen,:kinderen,:baby )");

 
    $stmt->bindParam(':gezinsnaam', $gezinsnaam);
    $stmt->bindParam(':adres', $adres);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':wensen', $wensen, PDO::PARAM_STR);
    $stmt->bindParam(':volwassen', $volwassen);
    $stmt->bindParam(':kinderen', $kinderen);
    $stmt->bindParam(':baby', $baby);

    // Voer de SQL-query uit
    $stmt->execute();

    // ga terug naar de goede pagina
    header("Location: ../php/overzichtklant.php");
    exit;
  }
} catch (PDOException $e) {
  // Toon een foutmelding als er iets misgaat
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
  <style>
    .hidden {
      display: none;
    }
  </style>
  </head>
<body class="bg-green-200 min-h-screen">
  <div class="flex justify-center items-center mt-20">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
      <!-- (Gezins)naam -->
      <div class="mb-6">
        <label for="gezinsnaam" class="block text-gray-700 text-sm font-bold mb-2">(Gezins)naam:</label>
        <input type="text" name="gezinsnaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <!-- Adres -->
      <div class="mb-6">
        <label for="adres" class="block text-gray-700 text-sm font-bold mb-2">Adres:</label>
        <input type="text" name="adres" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <!-- Telefoonnummer -->
      <div class="mb-6">
        <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Telefoonnummer:</label>
        <input type="tel" name="tel" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <!-- E-mail -->
      <div class="mb-6">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
        <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <!-- Specifieke wensen -->
      <div class="mb-6">
        <fieldset>
          <legend class="block text-gray-700 text-sm font-bold mb-2" name="wensen">Specifieke wensen:</legend>
          <div class="mb-2">
            <input type="checkbox" name="geenvlees" value="Geen varkenvlees">
            <label for="geenvlees" class="ml-2">Geen varkenvlees</label>
          </div>
          <div class="mb-2">
            <input type="checkbox" name="Veganistisch" value="Veganistisch">
            <label for="Veganistisch" class="ml-2">Veganistisch</label>
          </div>
          <div class="mb-2">
            <input type="checkbox" name="vegatarisch" value="Vegetarisch">
            <label for="vegatarisch" class="ml-2">Vegetarisch</label>
          </div>
          <div class="mb-2">
            <input type="checkbox" name="Anders" value="Anders" onclick="toggleDiv.call(this)">
            <label for="Anders" class="ml-2">Anders:</label>
          </div>
          <div id="andersDiv" class="hidden">
            <input type="text" name="andersTekst" placeholder="Andere wens" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
          </div>
        </fieldset>
      </div>
      <!-- Gezinssamenstelling -->
      <div class="mb-6">
        <label for="gezinssamenstelling" class="block text-gray-700 text-sm font-bold mb-2">Gezinssamenstelling:</label>
        <select name="gezinssamenstelling" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" onchange="toggleInputs.call(this)">
          <option value="Gezin met kinderen">Gezin met kinderen</option>
          <option value="Gezin zonder kinderen">Gezin zonder kinderen</option>
     
        </select>
      </div>
      <!-- Aantal volwassenen -->
      <div class="mb-6">
        <label for="volwassen" class="block text-gray-700 text-sm font-bold mb-2">Aantal volwassenen:</label>
        <input type="number" name="volwassen" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="0">
      </div>
      <!-- Aantal kinderen -->
      <div class="mb-6" id="kinderenDiv">
        <label for="kinderen" class="block text-gray-700 text-sm font-bold mb-2">Aantal kinderen:</label>
        <input type="number" name="kinderen" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="0">
      </div>
      <!-- Aantal baby's -->
      <div class="mb-6" id="babyDiv">
        <label for="baby" class="block text-gray-700 text-sm font-bold mb-2">Aantal baby's:</label>
        <input type="number" name="baby" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="0">
      </div>
      <!-- Verzenden knop -->
      <div class="flex items-center justify-center">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
          Verzenden
        </button>
      </div>
    </form>
  </div>
  <script>
    function toggleInputs() {
      var gezinssamenstelling = this.value;
      var kinderenDiv = document.getElementById("kinderenDiv");
      var babyDiv = document.getElementById("babyDiv");

      if (gezinssamenstelling === "Alleenstaand" || gezinssamenstelling === "Gezin zonder kinderen") {
        kinderenDiv.style.display = "none";
        babyDiv.style.display = "none";
      } else {
        kinderenDiv.style.display = "block";
        babyDiv.style.display = "block";
      }
    }

    function toggleDiv() {
      var div = document.getElementById("andersDiv");
      div.style.display = this.checked ? "block" : "none";
    }
  </script>
</body>
</html>
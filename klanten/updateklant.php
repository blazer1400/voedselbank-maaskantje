<?php
// Database
$host = 'localhost';
$dbName = 'maaskantje123';
$username = 'root';
$password = '';

try {
  // Maak een nieuwe PDO aan
  $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);

  // Stel de PDO-fout
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Controleer of het formulier is ingediend
  if (isset($_POST['gezinsnaam'])) {
    // Haal de ingevulde gegevens op uit het formulier
    $gezinsnaam = $_POST['gezinsnaam'];
    $adres = $_POST['adres'];
    $telefoonnummer = $_POST['tel'];
    $email = $_POST['email'];
    $specifiekeWensen = $_POST['specifieke_wensen'];

    if (isset($_POST['geenvlees'])) {
      $specifiekeWensen .= $_POST['geenvlees'] . ', ';
    }
    if (isset($_POST['Veganistisch'])) {
      $specifiekeWensen .= $_POST['Veganistisch'] . ', ';
    }
    if (isset($_POST['vegatarisch'])) {
      $specifiekeWensen .= $_POST['vegatarisch'] . ', ';
    }
    if (isset($_POST['Anders'])) {
      $specifiekeWensen .= $_POST['andersTekst'];
    }
    
    $gezinssamenstelling = $_POST['gezinssamenstelling'];
    $aantalVolwassenen = $_POST['volwassen'];
    $aantalKinderen = $_POST['kinderen'];
    $aantalBaby = $_POST['baby'];

   
// Voeg de gegevens toe aan de database
$query = "UPDATE klanten SET gezinsnaam = :gezinsnaam, adres = :adres, telefoonnummer = :telefoonnummer, email = :email, wensen = :specifiekeWensen, volwassen = :aantalVolwassenen, tieners = :aantalKinderen, babys = :aantalBaby";
$stmt = $db->prepare($query);
$stmt->bindParam(':gezinsnaam', $gezinsnaam);
$stmt->bindParam(':adres', $adres);
$stmt->bindParam(':telefoonnummer', $telefoonnummer);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':specifiekeWensen', $specifiekeWensen);
$stmt->bindParam(':aantalVolwassenen', $aantalVolwassenen);
$stmt->bindParam(':aantalKinderen', $aantalKinderen);
$stmt->bindParam(':aantalBaby', $aantalBaby);
$stmt->execute();

    // Ga naar de pagina na het toevoegen van de gegevens
    header('Location: ../php/overzichtklant.php');
    exit();
  }
} catch (PDOException $e) {
  // Als er een fout is opgetreden in de verbinding of database.
  echo 'Error: ' . $e->getMessage();
}

try {
  // Haal de klantgegevens op uit de database
  $query = "SELECT `gezinsnaam`, `adres`, `telefoonnummer`, `email`, `wensen`, `volwassen`, `tieners`, `babys` FROM `klanten`";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $customer = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // Als er een fout is opgetreden in de verbinding of database.
  echo 'Error: ' . $e->getMessage();
}
?>

<!-- HTML-formulier voor klanten -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add customer</title>
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
        <input type="text" name="gezinsnaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['gezinsnaam']; ?>">
      </div>
      <!-- Adres -->
      <div class="mb-6">
        <label for="adres" class="block text-gray-700 text-sm font-bold mb-2">Adres:</label>
        <input type="text" name="adres" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['adres']; ?>">
      </div>
      <!-- Telefoonnummer -->
      <div class="mb-6">
        <label for="tel" class="block text-gray-700 text-sm font-bold mb-2">Telefoonnummer:</label>
        <input type="tel" name="tel" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['telefoonnummer']; ?>">
      </div>
      <!-- E-mail -->
      <div class="mb-6">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
        <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['email']; ?>">
      </div>
      <!-- Specifieke wensen -->
      <div class="mb-6">
        <label for="specifieke_wensen" class="block text-gray-700 text-sm font-bold mb-2">Specifieke wensen:</label>
        <textarea name="specifieke_wensen" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500"><?php echo $customer['wensen']; ?></textarea>
      </div>
      <!-- Gezinssamenstelling -->
      <div class="mb-6">
        <label for="gezinssamenstelling" class="block text-gray-700 text-sm font-bold mb-2">Gezinssamenstelling:</label>
        
      </div>
      <!-- Aantal volwassenen -->
      <div class="mb-6">
        <label for="volwassen" class="block text-gray-700 text-sm font-bold mb-2">Aantal volwassenen:</label>
        <input type="number" name="volwassen" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['volwassen']; ?>">
      </div>
      <!-- Aantal kinderen -->
      <div class="mb-6" >
        <label for="kinderen" class="block text-gray-700 text-sm font-bold mb-2">Aantal kinderen:</label>
        <input type="number" name="kinderen" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['tieners']; ?>">
      </div>
      <!-- Aantal baby's -->
      <div class="mb-6 ">
        <label for="baby" class="block text-gray-700 text-sm font-bold mb-2">Aantal baby's:</label>
        <input type="number" name="baby" min="0" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" value="<?php echo $customer['babys']; ?>">
      </div>
      <!-- Submit knop -->
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Opslaan</button>
        <a href="../php/overzichtklant.php" class="text-gray-500">Annuleren</a>
      </div>
    </form>
  </div>
  <script>
    function toggleInputs() {
      const inputElements = document.querySelectorAll('.hidden input');
      inputElements.forEach(input => {
        input.value = '';
        input.disabled = !this.value.includes('Gezin met kinderen');
      });
    }
  </script>
</body>
</html>
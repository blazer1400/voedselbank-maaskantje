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
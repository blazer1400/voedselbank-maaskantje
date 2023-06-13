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

 
</body>
<footer>
<script>
    const form = document.getElementById('categoryForm');
    const secondFormContainer = document.getElementById('secondFormContainer');


    // maakt een evenment aan 
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // voorkomt het gedrag van het formulier bij indienen

      const category = document.getElementById('categorie').value;

      // maakt de volgende form op basis van de gekozen categorie
      const secondFormHTML = `
        <form id="secondForm" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96">
          <h2 class="text-center text-xl font-bold mb-6">Gekozen categorie: ${category}</h2>
          <div class="mb-6">
        <label for="fotocategorie" class="block text-gray-700 text-sm font-bold mb-2">Voeg een plaatje</label>
        <input type="file" name="fotocategorie" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
          <div class="mb-6">
        <label for="categorienaam" class="block text-gray-700 text-sm font-bold mb-2">categorie naam</label>
        <input type="text" name="categorienaam" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500">
      </div>
      <div class="flex justify-center">
        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          verander categorie
        </button>
      </div>
        </form>
      `;
        // laat de volgende form zien
      secondFormContainer.innerHTML = secondFormHTML;
    });
  </script>
</footer>
</html>
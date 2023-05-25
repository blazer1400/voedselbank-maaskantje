<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorie Soepen, sauzen, kruiden, olie</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<header class="bg-green-200 w-full">
  <!-- Nav Bar met een zoekbalk -->
  <nav class="bg-green-200 text-white flex flex-col sm:flex-row justify-between items-center py-3 px-5">
    <div class="flex items-center">
      <h1 class="text-2xl sm:text-xl font-bold text-green-500">Maaskantje</h1>
      <a href="/" class="text-lg sm:text-base text-green-500 font-bold py-2 px-5 rounded hover:underline">
        Home
      </a>
    </div>
    <div class="flex items-center flex-grow sm:flex-initial sm:ml-5 space-x-0 mt-4 sm:mt-0 flex-1">
      <div class="flex justify-center">
        <input type="text" placeholder="Zoek EAN..." class="px-4 py-2 border border-gray-300 rounded-l text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
        <button class="px-4 py-2 bg-green-500 text-white rounded-l-none rounded-r">Zoek</button>
      </div>
    </div>
    <div class="flex items-center space-x-5 mt-4 sm:mt-0">
      <a href="#"><i class="uil uil-user text-green-500 text-xl hover:underline"></i></a>
      <h2 class="text-green-500 rounded py-3 px-5">User Name</h2>
    </div>
  </nav>
</header>
<body class="bg-green-200 w-full h-screen">
  <div class="flex justify-center items-start h-screen">
    <div class="p-5">
      <h1 class="text-xl mb-2">Soepen, sauzen, kruiden, olie</h1>
      <div class="overflow-auto rounded-lg shadow hidden md:block">
        <table class="w-full">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Streepjescode</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Aantal producten</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Product omschrijving</th>
              <th class="p-3 text-sm font-semibold tracking-wide text-left">Productnaam</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr class="bg-white">
              <td class="w-24 p-3 text-sm text-gray-700 whitespace-nowrap" >
                <a href="#" class="font-bold text-blue-500">9742567892671</a>
              </td>
              <td class="w-30 p-3 text-sm text-gray-700 whitespace-nowrap">65</td>
              <td class="w-42 p-3 text-sm text-gray-700 whitespace-nowrap">
                Dit is een appel soort.
              </td>
              <td class="w-24 p-3 text-sm text-gray-700 whitespace-nowrap">Granny Smith</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
        <div class="bg-white space-y-3 p-4 rounded-lg shadow">
          <div class="flex items-center space-x-2 text-sm">
            <div>
              <a href="#" class="text-blue-500 font-bold hover:underline">9742567892671</a>
            </div>
            <div class="text-gray-500">65</div>
            <div class="text-sm text-gray-500">Dit is een appel</div>
            <div class="text-sm font-medium text-black">Granny smith</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorie kaas, vleeswaren</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body class="bg-green-200 w-full h-screen">
  
  <div class="w-full h-screen flex flex-col items-center justify-start pt-10">
    <div class="w-11/12 md:w-8/12 x1:w-1/2 h-auto p-5 rounded-3xl bg-white flex flex-col">
        <!-- Dit is de eerste section voor de zoekbalk -->
          <section class="w-full h-10 flex items-center ">
        <!-- plaatjes voor zoekbalk container -->
        <span class="w-10 h-full hidden md:flex items-center">
        <i class="uil uil-search text-xl text-green-800"></i>
        </span>
        <!-- input type -->
        <input type="text" class="w-full h-full font-meduim
        md:pl-2 focus:outline-none" placeholder="Zoek streepjescode ....">
        <!-- zoek knop -->
        <button class="w-28 h-full bg-green-800 flex justify-center items-center rounded-2xl text-white
         font-medium">Zoeken</button>
          </section>
</div>

          <div class="p-5 h-screen bg-green-200">
            <h1 class="text-xl mb-2">Kaas, vleeswaren</h1>
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

          
</body>
</html>
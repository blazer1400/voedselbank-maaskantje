<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overzicht van producten</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<header class="bg-green-200 w-full">

  <div class="flex flex-col items-center justify-start pt-10">
  
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
          </header>
          <body class="bg-green-200 w-full h-screen">
    </div class="flex flex-col">
    <!-- categorie section met alle categorien erin -->
    <div class="w-full flex flex-wrap flex-row justify-evenly items-center ">
  <div class="flex flex-col my-5 space-y-2">
    <a href="../files/aardappel-groente-fruit.php">
      <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/aardappel-groente-fruit.png" alt="foto van aardappel-groente-fruit">
      </span>
      <span><p class="font-medium text-base ">Aardappelen, groente, fruit</p></span>
    </div>
  </a>

  <a href="../files/kaas-vleeswaren.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/kaas-vleeswaren.png" alt="foto van kaas-vleeswaren">
      </span>
      <span><p class="font-medium text-base text-center">Kaas, vleeswaren</p></span>
    </div>
    </a>

    <a href="../files/zuivel.php">
    <div class="bg-white p-10 flex flex-col items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/zuivel-plantaardig-eieren.png" alt="foto van zuivel-plantaardig-eieren">
      </span>
      <span><p class="font-medium text-base text-center">Zuviel, plantaardig, eieren</p></span>
    </div>
    </a>

    </div>
   
 <div class="flex flex-col my-5 space-y-2"> 
 
<a href="../files/bakkerij.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/bakkerij-banket.png" alt="foto van bakkerij-banket">
      </span>
      <span><p class="font-medium text-base text-center">Bakkerij, banket</p></span>
    </div>
    </a>

    <a href="../files/frisdrank.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/frisdrank-sappen-koffie-thee.png" alt="foto van frisdrank-sappen-koffie-thee">
      </span>
      <span><p class="font-medium text-base text-center">frisdrank, sappen, koffie, thee</p></span>
    </div>
    </a>

    <a href="../files/wereldkeuken.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/pasta-rijst-wereldkeuken.png" alt="foto van pasta-rijst-wereldkeuken">
      </span>
      <span><p class="font-medium text-base text-center">Pasta, rijst, wereldkeuken</p></span>
    </div>
    </a>
    </div>  
    
    <div class="flex flex-col my-5 space-y-2">
    <a href="../files/snoep.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/snoep-koek-chips-chocolade.png" alt="foto van snoep-koek-chips-chocolade">
      </span>
      <span><p class="font-medium text-base text-center">Snoep, koek, chips, chocolade</p></span>
    </div>
    </a>

    <a href="../files/snoep.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="img/overzichtproduct/soepen-sauzen-kruiden-olie.png" alt="foto van soepen-sauzen-kruiden-olie">
      </span>
      <span><p class="font-medium text-base text-center">Soepen, sauzen, kruiden, olie</p></span>
    </div>
    </a>
   
    <a href="../files/hygiëne.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="php/img/overzichtproduct/baby-verzorging-hygiëne.png" alt="foto van baby-verzorging-hygiëne">
      </span>
      <span><p class="font-medium text-base text-center">Baby, verzorging,hygiëne</p></span>
    </div>
    </a>
    </div>
 
    
    
  
  </div>
  </div>
  
 

</body>
</html>
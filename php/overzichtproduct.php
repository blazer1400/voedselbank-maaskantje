
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overzicht van producten</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/x-icon" href="../img/imghome/Logo.png">
  <!-- Icons CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<header class="bg-green-200 w-full">
    <!-- Navbar -->
    <div class="flex items-center h-20">
      <!-- Navbar Container -->
      <div class="mx-auto relative px-5 max-w-screen-xl w-full flex flex-wrap items-center justify-end">
        <!-- Navbar Logo -->
        <div class="absolute left-0 flex flex-row">
          <img class="h-10 hidden md:inline-block" src="../img/imghome/Logo.png" alt="het logo van voedselbank maaskantje">
          <div class="text-3xl font-light uppercase ml-2">
            <span class="hidden md:inline-block">Maaskantje</span>
          </div>
        </div>

        <!-- Navbar Menu -->
        <nav class="flex flex-row gap-5">
          <a href="Homepage.php">Home</a>
          <a href="overzichtproduct.php">Productvoorraad</a>
          <a href="#">Leveranciers</a>
          <a href="overzichtklant.php">klanten</a>
          <a class=" px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors  rounded" href="#">Log in</a>
        </nav>
      </div>
    </div>
</header>

<body class="bg-green-200 w-full h-screen">
  
<div class="flex items-center justify-end mr-10 mb-4">
    <button class="bg-green-800 border border-green-800 rounded px-3 py-2 hover:bg-green-500 hover:border-green-500">
      <a href="../productvoorraad/addproduct.php" class="text-white font-mono">Voeg product</a>
    </button>
  </div>
  <div class="flex items-center justify-end mr-10">
    <button class="bg-green-800 border border-green-800 rounded px-3 py-2 hover:bg-green-500 hover:border-green-500">
      <a href="../productvoorraad/changecategorie.php" class="text-white font-mono">Voeg categorie</a>
    </button>
  </div>
  
    </div class="flex flex-col">
    <!-- categorie section met alle categorien erin -->
    <div class="w-full flex flex-wrap flex-row justify-evenly items-center ">
    
  <div class="flex flex-col my-5 space-y-2">
    <a href="../files/aardappel-groente-fruit.php">
      <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/aardappel-groente-fruit.png" alt="foto van aardappel-groente-fruit">
      </span>
      <span><p class="font-medium text-base ">Aardappelen, groente, fruit</p></span>
    </div>
  </a>

  <a href="../files/kaas-vleeswaren.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/kaas-vleeswaren.png" alt="foto van kaas-vleeswaren">
      </span>
      <span><p class="font-medium text-base text-center">Kaas, vleeswaren</p></span>
    </div>
    </a>

    <a href="../files/zuivel.php">
    <div class="bg-white p-10 flex flex-col items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/zuivel-plantaardig-eieren.png" alt="foto van zuivel-plantaardig-eieren">
      </span>
      <span><p class="font-medium text-base text-center">Zuviel, plantaardig, eieren</p></span>
    </div>
    </a>

    </div>
   
 <div class="flex flex-col my-5 space-y-2"> 
 
<a href="../files/bakkerij.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/bakkerij-banket.png" alt="foto van bakkerij-banket">
      </span>
      <span><p class="font-medium text-base text-center">Bakkerij, banket</p></span>
    </div>
    </a>

    <a href="../files/frisdrank.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/frisdrank-sappen-koffie-thee.png" alt="foto van frisdrank-sappen-koffie-thee">
      </span>
      <span><p class="font-medium text-base text-center">frisdrank, sappen, koffie, thee</p></span>
    </div>
    </a>

    <a href="../files/wereldkeuken.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/pasta-rijst-wereldkeuken.png" alt="foto van pasta-rijst-wereldkeuken">
      </span>
      <span><p class="font-medium text-base text-center">Pasta, rijst, wereldkeuken</p></span>
    </div>
    </a>
    </div>  
    
    <div class="flex flex-col my-5 space-y-2">
    <a href="../files/snoep.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/snoep-koek-chips-chocolade.png" alt="foto van snoep-koek-chips-chocolade">
      </span>
      <span><p class="font-medium text-base text-center">Snoep, koek, chips, chocolade</p></span>
    </div>
    </a>

    <a href="../files/soepen.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/soepen-sauzen-kruiden-olie.png" alt="foto van soepen-sauzen-kruiden-olie">
      </span>
      <span><p class="font-medium text-base text-center">Soepen, sauzen, kruiden, olie</p></span>
    </div>
    </a>
   
    <a href="../files/hygiëne.php">
    <div class="bg-white p-10 flex flex-col  items-center shadow-lg shadow-black hover:bg-green-500">
      <span class="h-28 w-36">
        <img src="../img/imgproduct/baby-verzorging-hygiëne.png" alt="foto van baby-verzorging-hygiëne">
      </span>
      <span><p class="font-medium text-base text-center">Baby, verzorging,hygiëne</p></span>
    </div>
    </a>
    </div>
 
    
    
  
  </div>
  </div>
  
 

</body>
</html>
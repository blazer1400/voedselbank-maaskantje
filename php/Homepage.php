<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homepage</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <!-- Hero Section -->
  <section class="flex flex-col min-h-screen text-white bg-slate-600 bg-center bg-cover bg-blend-overlay bg-fixed bg-[url('../img/imghome/achtergrond.jpg')]">
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
          <a href="#">Voedselpakket</a>
          <a class=" px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors  rounded" href="#">Log in</a>
        </nav>
      </div>
    </div>

    <!-- Hero Section Content -->
    <div class="flex-1 flex items-center">
      <div class="text-center mx-auto">
        <h1 class="text-6xl font-semibold">Welkom bij Voedselbank Maaskantje</h1>
        <p class="font-light text-3xl mt-5">Waar iedereen recht heeft op een stukje vlees</p>
        <a class="px-5 py-2 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors mt-10 rounded" href="#">
           Stel pakket samen
        </a>
      </div>
    </div>
  </section>
</body>
</html>
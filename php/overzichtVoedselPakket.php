<?php
// maak connectie met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maaskantje123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // haalt info uit klanten
    $klantenQuery = $conn->query("SELECT * FROM klanten");
    $klanten = $klantenQuery->fetchAll(PDO::FETCH_ASSOC);

    // haalt info uit voedselpakket
    $voedselpakketenQuery = $conn->query("SELECT * FROM voedselpakketen");
    $voedselpakketen = $voedselpakketenQuery->fetchAll(PDO::FETCH_ASSOC);

    // haalt info uit productvoorraad
    $productvoorraadQuery = $conn->query("SELECT * FROM productvoorraad");
    $productvoorraad = $productvoorraadQuery->fetchAll(PDO::FETCH_ASSOC);

    // sluit de database
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Controleer of de datum van uitgifte al is ingesteld voor het huidige voedselpakket
function isDatumUitgifteIngesteld($pakketnummer, $voedselpakketen)
{
    foreach ($voedselpakketen as $pakket) {
        if ($pakket['Pakketnummer'] === $pakketnummer) {
            return $pakket['Datum uitgifte'] !== null;
        }
    }
    return false;
}

require('dbConnection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voedselpakket beheer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="../img/imghome/Logo.png">
</head>

<body class="bg-green-200">
    <!-- Navbar -->
    <div class="flex items-center h-20">
        <!-- Navbar Container -->
        <div class="mx-auto relative px-5 max-w-screen-xl w-full flex flex-wrap items-center justify-end">
            <!-- Navbar Logo -->
            <div class="absolute left-0 flex flex-row">
                <img class="h-10 hidden md:inline-block" src="../img/imghome/Logo.png"
                    alt="het logo van voedselbank maaskantje">
                <div class="text-3xl font-light uppercase ml-2">
                    <span class="hidden md:inline-block">Maaskantje</span>
                </div>
            </div>

            <!-- Navbar Menu -->
            <nav class="flex flex-row gap-5">
                <a href="Homepage.php">Home</a>
                <a href="overzichtproduct.php">Productvoorraad</a>
                <a href="../leveranciers/index.php">Leveranciers</a>
                <a href="overzichtklant.php">klanten</a>
                <a class="px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors rounded"
                    href="../index.php">Log in</a>
            </nav>
        </div>
    </div>

    <div class="flex items-center justify-end mr-5 mb-4">
        <button class="bg-green-800 border border-green-800 rounded px-3 py-2 hover:bg-green-500 hover:border-green-500">
            <a href="../voedselpakket-aanmaken" class="text-white font-mono">Voeg Voedselpakket</a>
        </button>
    </div>
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mt-8 mb-4">Voedselpakketen</h1>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="p-4 text-left">Pakketnummer</th>
                        <th class="p-4 text-left">Datum samenstelling</th>
                        <th class="p-4 text-left">Datum uitgifte</th>
                        <th class="p-4 text-left">Aantal producten</th>
                        <th class="p-4 text-left">Gezinsnaam</th>
                        <th class="p-4 text-left">Producten</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- dat alle info van de database in de table wordt gezet -->
                    <?php foreach ($voedselpakketen as $pakket): ?>
                        <tr>
                            <td class="p-4"><?php echo $pakket['Pakketnummer']; ?></td>
                            <td class="p-4"><?php echo $pakket['Datum sammenstelling']; ?></td>
                            <td class="p-4 date-cell">
                                <!--  datum van uitgifte al is ingesteld voor het huidige voedselpakket -->
                                <?php if (!isDatumUitgifteIngesteld($pakket['Pakketnummer'], $voedselpakketen)): ?>
                                    <form method="POST" action="../voedselpakket/DatumUitgifte.php">
                                        <input type="hidden" name="id" value="<?php echo $pakket['Pakketnummer']; ?>">
                                        <button name="dateButton" class="bg-green-800 border border-green-800 rounded px-3 py-2 hover:bg-green-500 hover:border-green-500">
                                            Datum
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <?php echo $pakket['Datum uitgifte']; ?>
                                <?php endif; ?>
                            </td>
                            <td class="p-4"><?php echo $pakket['Aantal producten']; ?></td>
                            <td class="p-4">
                                <!-- de gezinsnaam die is gekoppeld aan het specifieke klant-ID 
                                van het huidige voedselpakket en geeft deze weer -->
                                <?php
                                $gezinsnaam = "";
                                foreach ($klanten as $klant) {
                                    if ($klant['idklanten'] === $pakket['id_klant']) {
                                        $gezinsnaam = $klant['gezinsnaam'];
                                        break;
                                    }
                                }
                                echo $gezinsnaam;
                                ?>
                            </td>
                            <!-- namen van de producten op die zijn gekoppeld aan het huidige voedselpakketnummer  
                            geeft ze weer als een enkele string gescheiden door kommas -->
                            <td class="p-4">
                            <?php
                                    // $productnamen = [];
                                    //                 foreach ($productvoorraad as $product) {
                                    //                 if ($product['EAN Nummer'] === $pakket['Pakketnummer']) {
                                    //                 $productnamen[] = $product['Productnaam'];
                                    //         }
                                    //                 }
                                    //      echo implode(", ", $productnamen);

                                

                                    $query = $dbConnection->query("SELECT * FROM voedselpakketen_has_productvoorraad WHERE `voedselpakketen_Pakketnummer` = '" . $pakket['Pakketnummer'] . "'");
                                    while ($row = $query->fetch_assoc()) {
                                        $product_query = $dbConnection->query("SELECT Productnaam FROM productvoorraad WHERE `EAN Nummer` = '" . $row['productvoorraad_EAN Nummer'] . "' ");
                                        $result = $product_query->fetch_assoc();
                                        echo $result['Productnaam'] . ", ";
                                    }
                            ?>
                        </td>
                            <!-- knop dat het voedselpakket uit de database wordt verwijderd -->
                            <td class="p-4">
                                <a href="../voedselpakket/DeleteVoedselpakket.php?id=<?php echo $pakket['Pakketnummer']; ?>"
                                    class="text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
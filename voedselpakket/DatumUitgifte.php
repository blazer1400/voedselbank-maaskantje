<?php
// maak connectie met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maaskantje123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // dit is de huidige tijd vn nu
    $currentDate = date('Y-m-d');

  

    //  zorgt ervoor dat de datum van uitgifte wordt geimporteerd in de database
    $stmt = $conn->prepare("UPDATE voedselpakketen SET `Datum uitgifte` = ?");
    $stmt->execute([$currentDate]);

    // sluit de databse af
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// zorgt ervoor dat je weer terug komt naar de overzicht pagina
header("Location:  ../php/overzichtVoedselPakket.php");
exit;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maaskantje123";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM voedselpakketen WHERE Pakketnummer = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: ../php/overzichtVoedselPakket.php");
    exit;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>
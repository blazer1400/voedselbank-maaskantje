<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maaskantje123";

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM klanten WHERE idklanten = :id");

    // Bind the parameter
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();

    // Redirect to the page displaying the updated list of customers
    header("Location: ../php/overzichtklant.php");
    exit;
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

// ...
?>
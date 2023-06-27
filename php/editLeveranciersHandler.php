<?php

require('./dbConnection.php');

session_start();

$query = $dbConnection->query("UPDATE leveranciers SET bedrijfsnaam='" . $_POST['bedrijfsnaam'] ."', adres='" . $_POST['adres'] .
    "', naam='" . $_POST['naam'] . "', email='" . $_POST['email'] . "', telefoonnummer='" . $_POST['telefoonnummer'] . "'" .
    " WHERE idleveranciers='" . $_POST['id'] ."'");
if ($query) {
    header('location: ../leveranciers/');
} else {
    $_SESSION['error'] = 'Kon leverancier niet wijzigen: ' . $dbConnection->error;
}
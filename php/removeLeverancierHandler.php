<?php
require('./dbConnection.php');
require('./permissions/directiePermission.php');

if (!empty($_GET['id'])) {
    $query = $dbConnection->query("DELETE FROM leveranciers WHERE idleveranciers='" . $_GET['id'] . "'");
    if ($query) {
        header('location: ../leveranciers/');
    } else {
        print_r($dbConnection->error);
    }
} else {
    $_SESSION['error'] = 'Kon gebruiker niet verwijderen';
    header('location: ../leveranciers/');
}
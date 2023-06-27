<?php

require('../php/dbConnection.php');
require('../php/permissions/directiePermission.php');

if (!empty($_POST['bedrijfsnaam'])) {

    $query = $dbConnection->query("SELECT bedrijfsnaam FROM leveranciers WHERE bedrijfsnaam='".$_POST['bedrijfsnaam']."'");
    if (!empty($query->fetch_assoc())) {
        $_SESSION['error'] = 'Bedrijf bestaat al';
        header('location: ../leveranciers/leveranciersToevoegen');
    } else {
        $query = $dbConnection->query("INSERT INTO leveranciers (bedrijfsnaam, adres, naam, email, telefoonnummer, volgende_levering)" .
            "VALUES ('" . $_POST['bedrijfsnaam'] . "','" . $_POST['adres'] . "','" . $_POST['naam'] . "', '" . $_POST['email'] . "','" . $_POST['telefoonnummer'] . "', '" . $_POST['volgende_levering'] . "')");
        if ($query) {
            header('location: ../leveranciers');
        } else {
            $_SESSION['error'] = 'Kon leverancier niet aanmaken: ' . $dbConnection->error;
            header('location: ../leveranciers/leveranciersToevoegen');
        }
    }

} else {
    $_SESSION['error'] = 'Niet alle velden zijn ingevuld';
    header('location: ../leveranciers/leveranciersToevoegen');
}

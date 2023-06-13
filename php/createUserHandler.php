<?php

require('../php/dbConnection.php');
require('../php/permissions/directiePermission.php');

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['account_type'])) {

    if (strlen($_POST['password']) >= 8) {
        $query = $dbConnection->query("SELECT username FROM users WHERE username='".$_POST['username']."'");
        if (!empty($query->fetch_assoc())) {
            $_SESSION['error'] = 'Gebruikersnaam is al in gebruik';
            header('location: ../gebruikers/gebruikerToevoegen.php');
        } else {
            $query = $dbConnection->query("INSERT INTO users (username, password, account_type) VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "','" . $_POST['account_type'] . "')");
            if ($query) {
                header('location: ../gebruikers');
            } else {
                $_SESSION['error'] = 'Kon gebruiker niet aanmaken: ' . $dbConnection->error;
                header('location: ../gebruikers/gebruikerToevoegen.php');
            }
        }
    } else {
        $_SESSION['error'] = 'Wachtwoord moet minimaal 8 tekens bevatten';
        header('location: ../gebruikers/gebruikerToevoegen.php');
    }
} else {
    $_SESSION['error'] = 'Niet alle velden zijn ingevuld';
    header('location: ../gebruikers/gebruikerToevoegen.php');
}

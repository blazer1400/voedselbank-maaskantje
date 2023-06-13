<?php
require('./dbConnection.php');
require('./permissions/directiePermission.php');

if (!empty($_GET['id']) && $_GET['id'] !== $_SESSION['user']['user_id']) {
    $query = $dbConnection->query("DELETE FROM users WHERE user_id='" . $_GET['id'] . "'");
    if ($query) {
        header('location: ../index.php');
    } else {
        print_r($dbConnection->error);
    }
} else {
    $_SESSION['error'] = 'Kon gebruiker niet verwijderen';
    header('location: ../index.php');
}
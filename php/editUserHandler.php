<?php

require('./dbConnection.php');

session_start();

$query = $dbConnection->query("UPDATE users SET username='" . $_POST['username'] ."', account_type='" . $_POST['account_type'] .
    "' WHERE user_id='" . $_POST['id'] ."'");
if ($query) {
    header('location: ../index.php');
} else {
    $_SESSION['error'] = 'Kon gebruiker niet wijzigen: ' . $dbConnection->error;
}
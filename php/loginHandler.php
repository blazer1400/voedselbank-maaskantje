<?php

require('dbConnection.php');

session_start();

$query = $dbConnection->query("SELECT * FROM users WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'");

$row = mysqli_fetch_assoc($query);
if ($row) {
    $_SESSION['user'] = $row;
    header('location: ../dashboard.php');
} else {
    $_SESSION['error'] = 'Gebruikersnaam of wachtwoord onjuist';
    header('location: ../');
}
<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'voedselbank_maaskantje';

$dbConnection = new mysqli($host, $username, $password, $db);

if ($dbConnection->error) {
    die($dbConnection->error);
}
<?php

function setDb() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'maaskantje123';

    return new mysqli($host, $username, $password, $db);
}

$dbConnection = setDb();

if ($dbConnection->error) {
    die($dbConnection->error);
}
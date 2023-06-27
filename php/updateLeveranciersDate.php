<?php

require('dbConnection.php');

if ($dbConnection->query("UPDATE leveranciers SET volgende_levering = '" . $_GET['date'] . "' WHERE idleveranciers = '" . $_GET['id'] . "'")) {
    header('location: ../leveranciers');
} else {
    die($dbConnection->error);
}

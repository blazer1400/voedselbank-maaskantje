<?php

session_start();

if (empty($_SESSION['user']) || $_SESSION['user']['account_type'] != 1) {
    die('No access');
}
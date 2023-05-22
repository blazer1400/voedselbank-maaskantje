<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['error'] = 'test';
header('location: ../');
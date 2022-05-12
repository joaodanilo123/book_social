<?php

$host = 'localhost';
$user = 'root';
$password = '';

try {
    $connection = new PDO("mysql:host=$host;dbname=book_social", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}


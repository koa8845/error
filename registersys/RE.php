<?php
$servername = "localhost";
$userName = "root";
$userPassword = "";
$dbname ="registersys";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
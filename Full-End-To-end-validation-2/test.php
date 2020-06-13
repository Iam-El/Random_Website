<?php
/*Connect to database*/

$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "WDM";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Could not connect to database";
}

?>

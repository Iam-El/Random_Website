<?php
/*Connect to database*/

$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "WDM_LEAN";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection was made to the database";
} catch (PDOException $e) {
    echo "Could not connect to database";
}

?>

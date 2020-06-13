<?php
/*Connect to database*/
$success = "";
$error = "";
$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";

try {
    $success="";
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $success="Connection was made to database";
    var_dump($success);
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
 //  echo "Could not connect to database";
}

?>

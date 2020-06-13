


<?php
$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
   // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $connection->prepare("select * from info");
    $statement->execute();
    $result_new=$statement->fetchALL();
    print_r($result_new);


} catch (PDOException $e) {
    echo $e->getMessage();
}


?>


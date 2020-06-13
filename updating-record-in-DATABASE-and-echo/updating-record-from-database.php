<?php


$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";


$db = mysqli_connect($serverName, $user, $password, $dbName);
$success = "Connection was made to database";
var_dump($success);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());

}

$result = mysqli_query($db, "UPDATE student_record SET Name='elsyFernandes' where  Name='el'");
if($result){
    echo "database updated successfully";

}

?>
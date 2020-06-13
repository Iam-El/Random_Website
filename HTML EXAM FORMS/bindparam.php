<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bindparam</title>
</head>
<body>
<?php
$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['lastname'] ,$_GET['id'])){
        $lastname=trim($_GET['lastname']);
        $id=trim($_GET['id']);
        $people=$connection->prepare("select firstname,lastname FROM info where lastname=? and id=?");
        $people->bindParam('si',$lastname,$id);
        $people->execute();
        $people->bind_result($firstname,$lastname);
        while($people->fetch()){
            echo $firstname,'',$lastname, '<br>';
        }

}

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLOB</title>
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
    if(isset($_POST['submit'])){
       // $name=$_FILES['myfile'];
        $filename = $_FILES['myfile']['name'];
        $fileType = $_FILES['myfile']['type'];
        $data=file_get_contents($_FILES['myfile']['temp_name']);
        $stmt=$connection->prepare("insert into myblob values(3,?,?,?)");
        $stmt->bindParam(1,$filename);
        $stmt->bindParam(2,$fileType);
        $stmt->bindParam(3,$data);
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile" required/>
    <button name="submit">upload</button>
</form>

</form>
</body>
</html>
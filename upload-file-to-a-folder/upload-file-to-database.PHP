<?php


$serverName = "167.99.105.36";
$user = "emfutacl_root";
$password = "Jesuschrist!1234";
$dbName = "emfutacl_WDM";


$db = mysqli_connect($serverName, $user, $password, $dbName);
$success = "Connection was made to database";
var_dump($success);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());

}

if (isset($_POST['submit'])) {
    var_dump("iam here");
  $fileName=$_FILES['myfile']['name'];
  var_dump($fileName);
    $fileType = $_FILES['myfile']['type'];
    var_dump($fileType);
    $fileSize = $_FILES['myfile']['size'];
    var_dump($fileSize);

   // $fileExt=explode('.',$fileName);
   // var_dump($fileExt);
    $fileTempName = $_FILES['myfile']['tmp_name'];
    var_dump($fileTempName);
    $upload_dir="image/".$fileName;
    $uploaded_image= move_uploaded_file($fileTempName,$upload_dir);

//move uploaded image to a database

}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPLOAD A FILE</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile"/>
    <button type=submit name="submit">upload</button>
</form>

</body>
</html>
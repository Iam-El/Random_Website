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

if (isset($_POST['submit'])) {

    $fileName = $_FILES['myfile']['name'];


    $fileType = $_FILES['myfile']['type'];

    $fileSize = $_FILES['myfile']['size'];

    $fileTempName = $_FILES['myfile']['tmp_name'];
    $allowed = array("jpg", "png", "jpeg", "txt");
    $ext = end(explode('.', $fileName));
    $filenamenew = uniqid('', true) . "." . $ext;
    var_dump($filenamenew);

    if (in_array($ext, $allowed)) {

        if ($fileSize < 100000) {


            $upload_dir = "../upload-file-to-a-folder/image/" . $filenamenew;
            var_dump($upload_dir);
            $uploaded_image = move_uploaded_file($fileTempName, $upload_dir);

            // echo '<Script> alert(" file upload successful")</Script>';
        } else {
            echo '<Script> alert("Bigger File Size")</Script>';
        }

    } else {
        echo '<Script> alert("Invalid file upload")</Script>';
    }

    // $fileExt=explode('.',$fileName);
    // var_dump($fileExt);


//move uploaded image to a database


    $mydata = file_get_contents("../upload-file-to-a-folder/image/" . $filenamenew);


    $query = "INSERT INTO uploadedFilewithcontent(imgname,imagecontent) VALUES ('$filenamenew','$mydata')";
    mysqli_query($db, $query);


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
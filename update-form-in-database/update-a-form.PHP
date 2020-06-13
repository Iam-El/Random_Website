<?php


$new=$old="";

$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Exaw2";



$db = mysqli_connect($serverName, $user, $password, $dbName);
$success = "Connection was made to database";
var_dump($success);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





if (isset($_POST["update"])) {
    var_dump("I am inside update");
    $new = test_input($_POST["new"]);
    $old = test_input($_POST["old"]);
    var_dump($new);
    var_dump($old);

    $query = mysqli_query($db,"UPDATE Categories SET CategoryName='$new' WHERE CategoryName='$old'");
}


?>


<style>
    .second-category {
        margin-top: 20px;
    }

    button {
        margin-top: 20px;
        align-items: center;
        background: rebeccapurple;
        color: white;
    }

</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UpdateForm</title>
</head>
<body>
<form method="POST">
<div class="first-category">
    <label>Category To Change :</label>
    <input type="text" name="old"> </br>
</div>

<div class="second-category">
    <label>New Category Name :</label>
    <input type="text" name="new"> </br>
</div>
<div>
    <button type="submit" name="update">SAVE</button>
</div>

</form>

</body>
</html>
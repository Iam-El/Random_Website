<?php

session_start();
$success = "";
$error = "";
$nameError = $passwordError = "";
$name = $password = "";
$id = 0;
$msg = "";
$edit_state = false;


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
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET["submit"])) {
    $isValid = true;
    if (empty($_GET["name"])) {
        $nameError = "Name is requires";
        $isValid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name = test_input($_GET["name"]))) {
        unset($nameError);
        $nameError = "Name Contains only letter and white spaces";
        $isValid = false;
    } else {
        unset($nameError);
        $isValid = true;
        $name = test_input($_GET["name"]);


    }

    if (empty($_GET["password"])) {
        $passwordError = "Password  is required";
        $isValid = false;
    } elseif (!preg_match("/^\S{0,8}$/i", $password = test_input($_GET["password"]))) {
        unset($passwordError);
        $passwordError = "Password should be 0 to 8 NonSpace Characters";
        $isValid = false;
    } else {
        $isValid = true;
        unset($passwordError);
        $password = test_input($_GET["password"]);
    }

    if ($isValid) {
        $name = test_input($_GET["name"]);
        $password = test_input($_GET["password"]);
        $query = "INSERT INTO USER_DETAILS(name,password) VALUES ('$name','$password')";
        mysqli_query($db, $query);


    }
}

$result = mysqli_query($db, "SELECT * FROM USER_DETAILS order by name");




if (isset($_GET['update'])) {
    var_dump("did i come here");
    //$edit_state = true;
    $id = $_GET["id"];
    $name = test_input($_GET["name"]);
    $password = test_input($_GET["password"]);


    mysqli_query($db, "UPDATE USER_DETAILS SET name='$name', password='$password' WHERE ID=$id");

    header('location: display.php');


}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM USER_DETAILS WHERE ID=$id");
    echo "$id is deleted";
//    $_SESSION['message'] = "Address deleted!";
      header('location: display.php');
}



//
//if (isset($_GET['edit'])) {
//
//    $id = $_GET['edit'];
//
//    $edit_state = true;
//    $rec = mysqli_query($db, "SELECT * FROM USER_DETAILS WHERE ID='$id'");
//
//    $record = mysqli_fetch_array($rec);
//
//    $name = $record['name'];
//    $password = $record['password'];
//    $id = $record['ID'];
//
//
//}






?>

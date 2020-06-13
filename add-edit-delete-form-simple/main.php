<?php

session_start();
$success = "";
$error = "";
$nmeError = $addressError = "";
$name = $address = "";
$id=0;
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

//when you click the submit button
if (isset($_POST["save"])) {
    $isValid = true;
    if (empty($_POST["name"])) {
        $nmeError = "Name is Required";
        $isValid = false;

    } else {
        unset($nmeError);
        $isValid = $isValid;
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["address"])) {
        $addressError = "Address is Required";
        $isValid = false;

    } else {
        unset($addressError);
        $isValid = $isValid;
        $address = test_input($_POST["address"]);
    }

    if ($isValid) {

        $name = test_input($_POST["name"]);
        $address = test_input($_POST["address"]);
        $_SESSION['msg'] = "Address saved";
        $query = "INSERT INTO add_insert(Name,Address) VALUES ('$name','$address')";
        mysqli_query($db, $query);

        // var_dump($query);
        header('location:main.php');
        //$msg = "user has been added";


    }


}

if (isset($_POST['update'])) {
    //$edit_state = true;
    $id = $_POST["id"];
    $name = test_input($_POST["name"]);
    $address = test_input($_POST["address"]);


    mysqli_query($db, "UPDATE add_insert SET Name='$name', Address='$address' WHERE ID=$id");
    $_SESSION['message'] = "Address updated!";
    header('location: main.php');


}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM add_insert WHERE ID=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: main.php');
}

//RETRIEVE RESULTS

$myesults = mysqli_query($db, "SELECT * FROM add_insert");


?>

<?php

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM add_insert WHERE ID='$id'");

    $record = mysqli_fetch_array($rec);

    $name = $record['Name'];
    $address = $record['Address'];
    $id = $record['ID'];


}
?>


<style>
    .error-php {
        color: red;
    }

    .success-msg {
        color: green;
    }

    .msgc {
        margin: 30px auto;
        padding: 10px;
        border-radius: 5px;
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        width: 50%;
        text-align: center;
    }


</style>

<script>

</script>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
    <div class="msgc">
        <?php
        //  unset($_SESSION['msg']);
        echo $_SESSION['msg'];
        //unset($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($myesults)) {
        ?>

        <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td>
                <a href="main.php?edit=<?php echo $row['ID']; ?>">Edit</a></td>
            <td><a href="main.php?del=<?php echo $row['ID']; ?>">Delete</a>
            </td>
        </tr>

        <?php
    }

    ?>


    </tbody>
</table>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>Name</label><span class="error-php"> <?php echo $nmeError; ?></span>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
    </div>
    <div class="input-group">
        <label>Address</label><span class="error-php"> <?php echo $addressError; ?></span>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
    </div>
    <div class="input-group">
        <?php if ($edit_state == false): ?>

            <button class="btn" type="submit" name="save">Save</button>
        <?php else: ?>
            <button class="btn" type="submit" name="update">Update</button>
        <?php endif ?>
    </div>
    <span class="success-msg"><?php echo $msg; ?></span>
</form>
</body>
</html>
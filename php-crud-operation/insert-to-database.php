<?php

include 'crud-operation.php';

?>

<?php


if (isset($_GET['edit'])) {
    var_dump("i am here");

    $id = $_GET['edit'];

    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM USER_DETAILS WHERE ID='$id'");

    $record = mysqli_fetch_array($rec);

    $name = $record['name'];
    $password = $record['password'];
    $id = $record['ID'];
    var_dump("i am here tooo");


}


?>


<style>
    .error-php {
        color: red;
    }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
<body>
<form method="GET">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Username : </label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"> <span
            class="error-php"> <?php echo $nameError; ?></span><br>
    <label>Password : </label>
    <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"><span
            class="error-php"> <?php echo $passwordError; ?></span> <br>
    <?php if ($edit_state == false): ?>
        <button type="submit" name="submit">Submit</button>
    <?php else: ?>
        <button type="submit" name="update">Update</button>
    <?php endif ?>
</form>
</body>
</html>
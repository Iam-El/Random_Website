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

$result = mysqli_query($db, "SELECT * FROM student_record order by Name");
var_dump($result);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display HTML Forms</title>
</head>
<body>

<table align="centre" border="1px" style="width: 600px; line-height: 30px;" >
    <tr>
        <th colspan="4"><h2>Student Record</h2></th>
    </tr>

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>

        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Country']; ?></td>
        </tr>

        <?php
    }

    ?>
</table>
</body>
</html>
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

$result = mysqli_query($db, "SELECT * FROM countries");
//var_dump($result);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display IN HTML LIST</title>
</head>
<body>

<ul> COUNTRIES
    <li>India</li>
    <li>Pakistan</li>
    <li>England</li>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>


            <li><?php echo $row['Country']; ?></li>



        <?php
    }

    ?>
</ul>


</body>
</html>
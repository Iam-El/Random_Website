<?php
/*Connect to database*/

$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "WDM_LEAN";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection was made to the database";
} catch (PDOException $e) {
    echo "Could not connect to database";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="javascript_onload_on_html.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>FORM VALIDATIONS WITH ID</title>
</head>
<body>

<h1>HTML FORM VALIDATIONS</h1>
<hr>
<form onsubmit=validation(event)>
<div class="form-country">
    <label for="country">Country :</label>
    <input list="country" name="browser" placeholder="Country" class="datalist-class"><span id="error-country"></span>
    <datalist id="country">
        <option value="USA">
        <option value="india">
        <option value="pak">
        <option value="bla">
        <option value="ireland">
    </datalist>
    </label>
</div>
    <div class="form-password">
        <label for="password">Password : </label>
        <input id="password" type="password" name="password" placeholder="Password" class="password-class" /><span id="error-password"></span>
    </div>
    <div class="form-email">
        <label for="email">Email : </span></label>
        <input id="email" type="text" name="email" placeholder="Email Id" class="email-class"/><span id="error-email"></span>
    </div>
    <div class="form-button">
    <button type="submit">Register</button>
    </div>


</form>






</body>
</html>
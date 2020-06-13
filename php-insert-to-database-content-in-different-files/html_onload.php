<?php

include 'php-insert-to-database.php';

?>
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
<?php if ($connection)
    echo $success;
else
    echo $error;
?>

<form id="form-sample" method="POST">
    <div class="form-country">
        <label for="country">Country :</label>
        <input list="country" name="browser" placeholder="Country" class="datalist-class"
               value="<?php echo htmlspecialchars($country); ?>"/><span id="errorcountry "></span>
        <datalist id="country">
            <option value="USA">
            <option value="india">
            <option value="pak">
            <option value="bla">
            <option value="ireland">
        </datalist>
        <span
                class="error-php"> <?php echo $countryError; ?></span>
    </div>
    <div class="form-password">
        <label for="password">Password : </label>
        <input id="password" type="password" name="password" placeholder="Password" class="password-class"
               value="<?php echo htmlspecialchars($password); ?>"/><span id="errorpassword"></span>
        <span
                class="error-php"> <?php echo $passwordError; ?></span>
    </div>
    <div class="form-email">
        <label for="email">Email : </span></label>
        <input id="email" type="text" name="email" placeholder="Email Id" class="email-class"
               value="<?php echo htmlspecialchars($email); ?>"/><span id="erroremail"></span>
        <span
                class="error-php"> <?php echo $emailError; ?></span>
    </div>
    <div class="form-button">
        <button type="submit" name="Register">Register</button>
    </div>


</form>
</body>
</html>
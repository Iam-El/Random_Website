<?php
/*Connect to database*/
$success = "";
$error = "";
$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";

try {
    $success="";
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $success="Connection was made to database";
    var_dump($success);
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST["Register"])) {
        $isValid = true;
        if (empty($_POST["browser"])) {
            $countryError = "Country is requires";
            $isValid = false;
        } else {
            unset($countryError);
            $isValid = $isValid;
            $country = test_input($_POST["browser"]);
        }

        if (empty($_POST["password"])) {
            $passwordError = "Passwrd field is required";
        } elseif (!preg_match("/^\S{0,8}$/i", $password = test_input($_POST["password"]))) {
            unset($passwordError);
            $passwordError = "Password should be 0 to 8 NonSpace Characters";
            $isValid = false;
        } else {
            $isValid = $isValid;
            unset($passwordError);
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["email"])) {
            $emailError = "Email field is required";
            $isValid = false;
        } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = test_input($_POST["email"]))) {
            unset($emailError);
            $emailError = "Please Enter Valid email address";
            $isValid = false;
        } else {
            $isValid = $isValid;
            unset($emailError);
            $email = test_input($_POST["email"]);

        }

        if ($isValid) {

            $result = "";


            $password = test_input($_POST["password"]);
            $email = test_input($_POST["email"]);
            $country = test_input($_POST["browser"]);

            $data = [

                'email' => $email,
                'password' => $password,
                'country' => $country

            ];

            $statement = $connection->prepare("INSERT INTO user_info(emailid,userpassword,country) VALUES (:email,:password,:country)");
            $statement->execute($data);
            $result="Data is inserted successfully!!!!";

        }
    }
}

catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
    //  echo "Could not connect to database";
}

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
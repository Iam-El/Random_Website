<?php
include 'connect-database-exam.php';

$success = "";
$error = "";
$countryError = "";
$passwordError = "";
$emailError = "";
$country = $email = $password = "";

try {

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
            $passwordError = "Passwrd field is required";;
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
    catch
(PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);



}

?>
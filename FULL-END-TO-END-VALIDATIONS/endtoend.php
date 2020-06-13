<?php

//database connections using mysqli

$success = $failure = "";

$email = $password = $name = $surname = "";
$emailError = $passwordError = $nameError = $businesstypeError = "";


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

if (isset($_POST['save'])) {
    var_dump("i am heres");

    $isValid = true;
    if (empty($_POST['email'])) {
        $emailError = "Email is required";
        $isValid = false;
    } else if (!preg_match("/^\+?\d{1}\(?\d{3}[-.)]-?\d{3}[-.]\d{4}$/i", $email = test_input($_POST["email"]))) {
        unset($emailError);
        $emailError = "Enter valid  Email address";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
    }


    if (empty($_POST['password'])) {
        $passwordError = "Password is required";
        $isValid = false;
    } else if (!preg_match("/^\w[A-Za-z]{8,16}$/i", $password = test_input($_POST["password"]))) {
        unset($passwordError);
        $passwordError = "Enter valid  password";
        $isValid = false;
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST['name'])) {
        $nameError = "Name is required";
        $isValid = false;
    } else if (!preg_match("/^\S{0,8}$/i", $name = test_input($_POST["name"]))) {
        unset($nameError);
        $nameError = "Enter valid  Name";
        $isValid = $isValid;
    } else {
        $isValid = true;
        unset($nameError);
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST['business-type'])) {
        $businesstypeError = "business type is required";
        $isValid = false;
    } else {
        $isValid = true;
        $businesstype = test_input($_POST["business-type"]);

    }


    if ($isValid) {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $surname = test_input($_POST["surname"]);

        $query = "INSERT INTO record(name,password,Email,surname,businesstype) VALUES ('$name','$password','$email','$surname','$businesstype') ";
        $result = mysqli_query($db, $query);
        header('Location: ./endtoend.php');

    }
}

$mydata = mysqli_query($db, "SELECT * FROM record");


?>
<style>
    #erroremail {
        color: pink;
    }

    .error-email {
        color: red;
    }

    #errorpassword {
        color: pink;
    }

    #errorname {
        color: pink;
    }

    #erroroptions {
        color: pink;
    }

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JS VALIDATIONS</title>
</head>
<body>
<form id="form-sample" method="post" action="endtoend.php">
    <div>

        <label for="email">Email</label><br>
        <input id="email" type="text" placeholder="Email" name="email" class="field" required
               pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"
               title="Email address should contain @,.numbers"/>
        <span class="error-email"><?php echo $emailError ?></span>
        <span id="erroremail"></span>
    </div>
    <div>
        <label for="password">Password</label><br>
        <input id="password" type="password" name="password" placeholder="password" required
               pattern="^\w[A-Za-z]{8,16}$"
               title="Password should be valid"/>
        <span class="error-email"><?php echo $passwordError ?></span>
        <span id="errorpassword"></span>
    </div>

    <div>
        <label for="name">Name</label><br>
        <input id="name" type="text" name="name" placeholder="Name" required/>
        <span class="error-email"><?php echo $nameError ?></span>
        <span id="errorname"></span>
    </div>

    <div>
        <label for="surname">Surname</label><br>
        <input id="surname" type="text" name="surname" placeholder="surname"/>
    </div>

    <div>
        <label>TIPS</label> <span class="error-email"><?php echo $businesstypeError ?></span><span
                id="erroroptions"></span>
        <div id="options">
            <input name="business-type" type="radio" id="r1"
                   value="type1"/>Tipo de negocio 1
            <input name="business-type" type="radio" id="r2"
                   value="type2"/>Tipo de negocio 2
            <input name="business-type" type="radio" id="r3"
                   value="type3"/>Tipo de negocio 3
        </div>
    </div>

    <button type="submit" name="save">submit</button>


    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Surname</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        <?PHP while ($row = mysqli_fetch_array($mydata)) {

            ?>
            <tr>
                <td><?php echo $row['ID'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td><?php echo $row['surname'] ?></td>
                <td><?php echo $row['businesstype'] ?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</form>
</body>
</html>

<script>
    function errorMessage(id, msg) {
        var spanID = 'error' + id;
        var Span = document.getElementById(spanID);
        var divID = 'control' + id;
        var div = document.getElementById(divID);
        if (Span) {
            Span.innerHTML = msg;
        }
        if (div) {
            div.className = div.className + "error";
        }

    }

    function hideErrorMessage(id) {
        var spanID = document.getElementById(id);
        if (spanID) {
            spanID.innerHTML = "";
        }

    }

    function validateForm() {
        errorMsg = false;
        var emailValue = document.getElementById("email").value;
        var passwordValue = document.getElementById("password").value;
        var nameValue = document.getElementById("name").value;
        var surnameValue = document.getElementById("surname").value;
        var tipLenghth = document.querySelectorAll("[name=business-type]:checked").length;
        var emailReg = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
        var passwordReg = /^\w[A-Za-z]{8,16}$/;
        var userNameReg = /^\S{0,8}$/;

        if (emailValue == "") {
            errorMessage('email', 'Email is required');
            errorMsg = true;


        } else if (!emailReg.test(emailValue)) {
            errorMessage('email', 'Email is Not valid');
            errorMsg = true;
        } else {
            hideErrorMessage('erroremail');

        }
        if (passwordValue == "") {
            errorMessage('password', 'Password is required');
            errorMsg = true;


        } else if (!passwordReg.test(passwordValue)) {
            errorMessage('password', 'Password is Not valid');
            errorMsg = true;
        } else {
            hideErrorMessage('errorpassword');

        }


        if (nameValue == "") {
            errorMessage('name', 'Name is required');
            errorMsg = true;

        } else if (!userNameReg.test(nameValue)) {
            errorMessage('name', 'username is Not valid');
            errorMsg = true;
        } else {
            hideErrorMessage('errorname');

        }

        if (tipLenghth == 0) {
            errorMessage('options', 'Please select business type');
        } else {
            hideErrorMessage('erroroptions');
        }

        if (errorMsg) {
            event.preventDefault();
            event.stopPropagation();
        }


    }

    function init() {
        var formData = document.getElementById("form-sample");
        formData.onsubmit = validateForm;
    }

    window.onload = init;


</script>
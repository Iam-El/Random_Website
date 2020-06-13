<?php


//Database Connection

$servaerName = "localhost";
$user = "root";
$pass = "root";
$DBName = "Examw2";
$success = $error = "";

$emailError = "";
$nameError = "";
$passwordError = "";
$phoneError = "";
$name = $email = $phone = $surname = $password = $btype = "";

$db = mysqli_connect($servaerName, $user, $pass, $DBName);

if ($db) {
    $success = "Database connected";
    echo $success;
} else if (mysqli_connect_errno()) {
    // die(mysqli_connect_error());
    $error = "Could not connect to database";
    echo $error;

}

//PHP VALIDATION nad Insert to data base

//function test_input($data)
//{
//    $data = htmlspecialchars($data);
//    $data = trim($data);
//    $data = stripcslashes($data);
//}

if (isset($_POST['save'])) {
    var_dump("i am here");
    $isValid = true;


    if (empty($_POST['email'])) {
        $emailError = "Email field is required";
        $isValid = false;
    } elseif (!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/i", $email = $_POST["email"])) {
        unset($emailError);
        $emailError = "Email Field is Invalid.Please Enter Valid email address";
        $isValid = false;
    } else {
        $isValid = true;
        $email = $_POST["email"];
    }

    if (empty($_POST['password'])) {
        $passwordError = "Password field is required";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z]\w{8,16}$/i", $password = $_POST["password"])) {
        unset($passwordError);
        $passwordError = "Password Field is Invalid.Please Enter Valid Password";
        $isValid = false;
    } else {
        $isValid = true;
        $password = $_POST["password"];
    }

    if (empty($_POST['name'])) {
        $nameError = "Name field is required";
        $isValid = false;
    } elseif (!preg_match("/^\S{0,8}$/i", $name = $_POST["name"])) {
        unset($nameError);
        $nameError = "Name Field is Invalid.Please Enter Valid Name";
        $isValid = false;
    } else {
        $isValid = true;
        $name = $_POST["name"];
    }

    if (empty($_POST['phone'])) {
        $phoneError = "Phone field is required";
        $isValid = false;
    } elseif (!preg_match("/^\+?[1]{1}\(?\d{3}[-.)]\d{3}[-.]\d{4}$/i", $phone = $_POST["phone"])) {
        unset($phoneError);
        $phoneError = "Phone Field is Invalid.Please Enter Valid Phone";
        $isValid = false;
    } else {
        $isValid = true;
        $phone = $_POST["phone"];
    }

    if ($isValid) {
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $btype = $_POST["business-type"];
        $surname = $_POST["surname"];

        $query = "INSERT INTO record_new(name,password,Email,surname) VALUES ('$name','$password','$email','$surname')";
        mysqli_query($db, $query);
        header('location:end-to-end.php');
    }


}

$myresult = mysqli_query(db, "SELECT * FROM record_new");


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JS VALIDATIONS</title>
</head>
<body>
<form id="form-sample" method="post">
    <div>

        <label for="email">Email</label><br>
        <input id="email" type="text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email); ?>"
               class="field"/>
        <span class="error-email"><?php echo $emailError ?></span>
        <span id="erroremail"></span>
    </div>
    <div>
        <label for="password">Password</label><br>
        <input id="password" type="password" name="password" placeholder="password"
               value="<?php echo htmlspecialchars($password); ?>"/>
        <span class="error-email"><?php echo $passwordError ?></span>
        <span id="errorpassword"></span>
    </div>

    <div>
        <label for="name">Name</label><br>
        <input id="name" type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>"/>
        <span class="error-email"><?php echo $nameError ?></span>
        <span id="errorname"></span>
    </div>

    <div>
        <label for="surname">Surname</label><br>
        <input id="surname" type="text" name="surname" placeholder="surname"/>
    </div>

    <div>
        <label for="Phone">Phone</label><br>
        <input id="phone" type="text" name="phone" placeholder="+1(---)-------"
               value="<?php echo htmlspecialchars($phone); ?>"/>
        <span class="error-email"><?php echo $phoneError ?></span>
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

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        </tbody>
    </table>

</form>
</body>
</html>

<script>
    function errorMessage(id, msg) {
        var spanId = 'error' + id;
        var Span = document.getElementById(spanId);
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
        errmsg = false;
        var fnameValue = document.getElementById("Fname").value;
        var lnameValue = document.getElementById("Lname").value;
        var passwordValue = document.getElementById("password").value;
        var phoneValue = document.getElementById("phone").value;
        var surnameValue = document.getElementById("surname").value;

        var typeLenghth = document.querySelectorAll("[name=business-type]:checked").length;
        var emailReg = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
        var passReg = /^[a-zA-Z]\w{8,16}$/;
        var nameReg = /^[a-zA-Z]\w{8,16}$/;

        if (emailValue == "") {
            errorMessage('email', 'Email needed');
            errmsg = true;

        } else if (!emailReg.test(emailValue)) {
            errorMessage('email', 'Enter valid email');
            errmsg = true;
        } else {
            hideErrorMessage('erroremail');

        }

        if (passwordValue == "") {
            errorMessage('password', 'password needed');
            errmsg = true;

        } else if (!passReg.test(passwordValue)) {
            errorMessage('password', 'Enter valid password');
            errmsg = true;
        } else {
            hideErrorMessage('errorpassword');

        }

        if (nameVamue == "") {
            errorMessage('name', 'name needed');
            errmsg = true;

        } else if (!nameReg.test(nameVamue)) {
            errorMessage('name', 'Enter valid name');
            errmsg = true;
        } else {
            hideErrorMessage('errorname');

        }


        if (errmsg) {
            event.preventDefault();
            event.stopPropagation();
        }
    }

    function init() {
        var sampleForm = document.getElementById("form-sample");
        sampleForm.onsubmit = validateForm;
    }


    window.onload = init;
</script>
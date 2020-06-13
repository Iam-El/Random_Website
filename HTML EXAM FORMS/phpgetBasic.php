<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>get and post</title>
</head>
<?php
echo $_GET['name'];

?>


<body>
<form method="GET">
    <input type="hidden" name="name" value="value">
    <button type="submit">SUBMIT</button>

</form>

</body>
</html>
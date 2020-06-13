<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add/Delete/Edit/Update Form</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<form method="post" action="server.php" >
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="">
    </div>
    <div class="input-group">
        <label>Address</label>
        <input type="text" name="address" value="">
    </div>
    <div class="input-group">
        <button class="btn" type="submit" name="save" >Save</button>
    </div>
</form>

</body>
</html>
<?php

include 'crud-operation.php';

?>

<style>

    .update-button {
        color: white;
        background: green;
        width: 100px;
        height: 100px;
    }

    .delete-button {
        color: white;
        background: red;
        width: 100px;
        height: 100px;
    }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display</title>
</head>
<body>
<table align="centre" border="1px" style="width: 600px; line-height: 30px;">
    <tr>
        <th colspan="4"><h2>Student Record</h2></th>
    </tr>

    <tr>
        <th>ID</th>
        <th>Usename</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>

    </tr>

    <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <button class="update-button" type="submit"><a href="insert-to-database.php?edit=<?php echo $row['ID']; ?>">UPDATE</button>
            </td>
            <td>
                <button class="delete-button" type="submit"><a href="crud-operation.php?del=<?php echo $row['ID']; ?>">DELETE</button>
            </td>

        </tr>

        <?php
    }

    ?>

</table>

</body>
</html>
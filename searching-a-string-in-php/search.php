<?php
/*Connect to database*/
$success = "";
$error = "";
$searchError = "";
$search = "";
$output = "";

$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "Examw2";

try {
    $success = "";
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $success = "Connection was made to database";
    var_dump($success);

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if (isset($_POST["datasearch"])) {
        $isValid = true;
        if (empty($_POST["search"])) {
            $searchError = "Enter String to search";

            $isValid = false;

        } else {
            unset($countryError);
            $isValid = $isValid;
            $search = test_input($_POST["search"]);
        }

        if ($isValid) {

            $result = "";
            $search = test_input($_POST["search"]);
            $data = [

                'search' => $search,
            ];
            var_dump($data);
            var_dump($search);

            $statement = $connection->prepare("SELECT * FROM search WHERE ID LIKE '%$search%' OR Name LIKE '%$search%' OR Year LIKE '%$search%'");
            $statement->execute();
            var_dump($statement);
            if ($result = $statement->rowCount() > 0) {
                var_dump("i am inside");

                $rows = $statement->fetchAll();
                 foreach ($rows as $row) {
                    var_dump("$row");

                    $ID = $row['ID'];
                    $Name = $row['Name'];
                    $Year = $row['Year'];
                    var_dump('$ID');
                    var_dump('$Name');
                    var_dump('$Year');
                  $output="ID:$ID </br> Name:$Name </br> Year:$Year";

                }

            } else {
                $output = "No Results";
            }
        }

    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    var_dump($error);
    //  echo "Could not connect to database";
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <title>Search</title>
</head>
<body>

<form method="POST">

    <div>
        <input type="text" name="search" placeholder="Enter Search String"
               value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" name="datasearch">Search</button>
        <div>
            <span class="error-php"> <?php echo $searchError; ?></span>
            <span class="error-php"> <?php if ($output) echo $output; ?></span>
        </div>

    </div>
</form>

</body>
</html>
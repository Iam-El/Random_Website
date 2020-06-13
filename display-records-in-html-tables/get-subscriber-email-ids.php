<?php
$query = "SELECT * FROM Lean_Subscriber";
$queryStatement = $connection->query($query);
while ($results = $queryStatement->fetch()) {
    echo $results['EmailId'] . "<br />\n";
}
?>
<?php

include '../backend/connect-database.php';

$success = "";
$error = "";
try {
    $query = "SELECT roleid FROM lean_roles where rolename = 'business';";
    $queryStatement = $connection->query($query);
    $results = $queryStatement->fetch();

    $businessType = $_POST['businessType'];
    $query1= "SELECT id FROM lean_business_type where type = '" . $businessType . "';";
    $queryStatement2 = $connection->query($query1);
    $businessTypeResults = $queryStatement2->fetch();

    $data = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'surname' => $_POST['surname'],
        'ciu' => $_POST['ciu'],
        'state' => $_POST['state'],
        'pin' => $_POST['pin'],
        'direction' => $_POST['direction'],
        'roleid' => $results[0]['roleId'],
        'id' => $businessTypeResults[0]['id']
    ];

    $statement = $connection->prepare("INSERT INTO lean_users(roleid,emailid,password,firstname, lastname,address,city,state,pin,id) VALUES (:roleid,:email,:password,:username,:surname,:direction,:ciu,:state,:pin,:id)");
    $statement->execute($data);
    $result = array('success' => true);


} catch (PDOException $e) {
    $result = array('success' => false, 'message' => $e->getMessage());
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
}

echo json_encode($result);
?>
<?php
require("./Database.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-with");

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$firstName = $body['firstName'];
$lastName = $body['lastName'];
$address = $body['address'];
$age = $body['age'];
$gender = $body['gender'];



// $firstName = $_REQUEST['firstName'];
// $lastName = $_REQUEST['lastName'];
// $address = $_REQUEST['address'];
// $age = $_REQUEST['age'];
// $gender = $_REQUEST['gender'];


if (empty($firstName) || empty($lastName) || empty($address) || empty($age) || empty($gender)) {
    echo json_encode("None of the fields must be empty");
    exit;
}
$database = new Database();
$database->save("register", "first_name= '$firstName',last_name= '$lastName',address= '$address',age= '$age',gender= '$gender'");

// save into db
echo json_encode("Registration Successful");
exit;

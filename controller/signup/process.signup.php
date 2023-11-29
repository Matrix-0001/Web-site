<?php
if (empty($_POST["name"])){
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid Email is required");
}

if (strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password does not match");
}

if (!preg_match("/^592\d{7}$/", $_POST["phonenumber"])) {
    die("Please enter a valid phone number with '592' prefix (e.g., 5921234567)");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/../../model/database/connection.php";

$sql = "INSERT INTO user (name, email, password_hash, phonenumber) VALUES (?,?,?,?)"; 

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $password_hash, $_POST["phonenumber"]);


if ($stmt -> execute()){
header("Location: ../../view/signup/signup-success.html");
exit;
} else {
    if($mysqli -> errno === 1062){
        die("email already taken");
    }else {
        die($mysqli -> error. "". $mysqli -> errno);
    }
}
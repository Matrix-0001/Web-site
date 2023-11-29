<?php
session_start();

$is_invalid = false; // Initialize the variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/../../model/database/connection.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $user_id;
            header("Location: ../home/homepage.php");
            exit;
        } else {
            $is_invalid = true; // Set as invalid if password doesn't match
        }
    } else {
        $is_invalid = true; // Set as invalid if no matching user found
    }
}
?>

<!DOCTYPE html>
<html>
<!-- Rest of your HTML content -->

<head>
    <link rel="stylesheet" href="../../styles/login_styles.css">
</head>
<div class="validation"> <?php if ($is_invalid): ?>
    <p class="invalid-msg"> Invalid Login <a href="/view/signup/signup.html">Sign up here</a></p>
    <?php endif; ?>
    <div>


</html>
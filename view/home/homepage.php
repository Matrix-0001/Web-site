<?php

session_start();

if(isset($_SESSION["user_id"])){
    $mysqli = require_once(__DIR__ . '/../../model/database/connection.php');


    $sql = "SELECT *FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli -> query($sql);
    $user = $result -> fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Online Shopping</title>
    <script src="https://kit.fontawesome.com/579f240a75.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "../nav-links/nav.html" ?>
    <section class="Welcome">
        <h1>WELCOME TO SHOPFLAIR</h1>
        <p>Discover a world of endless possibilities in the world of online
            shopping.<br> At [Your Website Name], we bring you the latest
            trends, the most coveted <br> products, and an unparalleled
            shopping
            experience, all at your fingertips.</p>
    </section>
    <?php include_once '../searchbar/searchbar.php';   ?>

    <section class="Dia1"></section>
    <section class="Dia2"></section>
    <section class="Dia3"></section>

    <?php if(isset($_SESSION["user_id"])): ?>

    <p>Hello <?= htmlspecialchars($user["name"]) ?> have an amazing time</p>



    <p> <button><a href="../../controller/login/logout.php"> Log out</a> </button></p>

    <?php else: ?>
    <p><a href="../../view/login/login.php">Log in </a> or <a href="../../process/signup.html"> sign up</a></p>

    <?php endif; ?>

</body>


</html>
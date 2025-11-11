<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Videogames
        </title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <ul id="menu-bar">
            <li class="list-menu"><a href="home.php">Home</a></li>
            <li class="list-menu"><a href="videogames.php">Videogames</a></li>
            <li class="list-menu"><a href="consoles.php">Consoles</a></li>
            <li class="list-menu"><a href="deals.php">Deals</a></li>
            <li class="list-menu"><a href="pre-owned.php">Pre-Owned</a></li>
        </ul>
    </body>
</html>
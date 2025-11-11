<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
    <title>
        Game Zone
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
</head>

<body class="mainbody">
    <nav class="navbar">

        <div class="weblogo">
            <a href="home.php"><img src="images/logonavbar/logo.png" alt="logo"></a>
        </div>

        <div class="navbuttons">

            <button><a href="home.php">Home</a></button>

        <div class="dropdown">
            <button class="dropbtn">Videogames</button>

            <div class="dropdown-content">
                <a href="xboxgames.php" id="xboxbtn">Xbox</a>
                <a href="playstationgames.php" id="playbtn">PlayStation</a>
            </div>
        </div>
            
            <button><a href="consoles.php">Consoles</a></button>
            <button><a href="deals.php">Deals</a></button>
            <button><a href="pre-owned.php">Pre-Owned</a></button>
        </div>

        <div class="cart">
            <button><a href="cart.php">Cart</a></button>
        </div>

        <div class="logout-info">
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <button><a href="logout.php">Log Out</a></button>
        </div>
        </nav>

    <div class="mainheader">
        <br>
        <br>
        <h2>Welcome to GAME ZONE</h2>
        <br>
        <br>
        <hr>
        <br>
    </div>

    <div class="homelayout">
        <div class="homecontentLeft">
            <br>
            <p id="p1home">"Welcome to our website, where you will find a wide selection of the best video games, including all your favorite consoles. We also have amazing special offers to help you save. To make your shopping even easier, check out our Pre-Owned and Deals sections, located conveniently in the top navigation bar. Explore and find the perfect game for you today!"</p>
        </div>

        <div class="homecontentRight">
            <br>
            <h3 id="headermain">Lets begin the game!!!</h3>
            <br>
            <a href="xboxgames.php"><img src="images/mario.gif" alt="mario gift" id="gifmario"></a>
        </div>
    </div>

    <div class="footermain">
        <br>
        <hr>
        <br>
        <footer>
            <p>&copy; 2025 Game Zone. All rights reserved.</p>
            <p>Contact us at: <a href="mailto:gamezone@outlook.com">gamezone@outlook.com</a></p>
        </footer>
        <br>
    </div>

<script src="javascript/script.js"></script>
</body>
</html>
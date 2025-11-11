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
        Ready to pay
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
        <h2>Cart, Ready to Buy?</h2>
        <br>
        <br>
        <hr>
        <br>
    </div>

    <div class="cartcontent">
        <div class="columnscart">
            <div class="leftcolumncart"></div>

            <div class="middlecolumncart">
                <div id="cartItems">

                </div>
                <br>
                <hr>
                <br>

                <div class="priceBill">
                    <div class="subTotal">
                        <strong>Subtotal Price:</strong> $<span id="subTotal">0.00</span>
                    </div>

                    <div class="taxes">
                        <strong>Estimated Taxes:</strong> $<span id="taxes">0.00</span>
                    </div>

                    <div class="fullTotal">
                        <strong>Total:</strong> $<span id="fullTotal">0.00</span>
                    </div>
                </div>
            </div>

            <div class="rightcolumncart"></div>
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
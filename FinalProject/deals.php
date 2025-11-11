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
        Deals
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
        <h2>Deals</h2>
        <br>
        <br>
        <hr>
        <br>
    </div>

    <div class="maincontent">
        <div class="columns">
            <div class="leftcolumn"></div>

            <div class="middlecolumn">
                <div class="product">
                    <div class="productimage">
                        <img src="images/deals/gtaV.jpg" alt="GTA V">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Grand Theft Auto V</h3>
                        <p class="productprice">$19.99</p>
                        <del>$39.99</del>
                        <button class="addcart" onclick="addToCart('GTA V', 19.99, 'deals')">Add to cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">GTA V offers an expansive open world where players control three criminals in the city of Los Santos. Engage in heists, explore vast landscapes, and experience thrilling missions in this action-packed, narrative-driven adventure with online multiplayer modes.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/deals/nba2k25.jpg" alt="NBA 2K25">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">NBA 2K25</h3>
                        <p class="productprice">$24.99</p>
                        <del>$69.99</del>
                        <button class="addcart" onclick="addToCart('NBA 2K25', 24.99, 'deals')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">NBA 2K25 brings realistic basketball action with enhanced gameplay mechanics, new player models, and deeper customization. Experience improved graphics, smarter AI, and exciting game modes like MyCareer and MyTeam, offering both competitive and casual players a premium basketball experience.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/deals/reddeadredemption2.jpg" alt="Read Dead Redemption 2">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Red Dead Redemption 2</h3>
                        <p class="productprice">$19.99</p>
                        <del>$29.99</del>
                        <button class="addcart" onclick="addToCart('Red Dead Redemption 2', 19.99, 'deals')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Red Dead Redemption 2 is an open-world action-adventure set in the American frontier. Players follow Arthur Morgan, an outlaw in the Van der Linde gang, as they explore a stunning world, engage in intense shootouts, and experience a captivating story.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/deals/collegefootball2025.jpg" alt="College Football 2025">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">College Football 2025</h3>
                        <p class="productprice">$34.99</p>
                        <del>$69.99</del>
                        <button class="addcart" onclick="addToCart('College Football 2025', 34.99, 'deals')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">College Football 2025 offers an immersive and realistic simulation of the college football world. Players can control teams, recruit top athletes, and experience the excitement of the NCAA. With improved graphics and mechanics, the game delivers a deep sports simulation experience.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/deals/finalfantasyrebirth.jpg" alt="Final Fantasy Rebirth">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Final Fantasy Rebirth</h3>
                        <p class="productprice">$49.99</p>
                        <del>$69.99</del>
                        <button class="addcart" onclick="addToCart('Final Fantasy Rebirth', 49.99, 'deals')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Final Fantasy Rebirth is the highly anticipated sequel to Final Fantasy VII Remake. Featuring stunning visuals, an expanded storyline, and dynamic combat, players continue Cloud's journey through a world full of mystery, danger, and unforgettable characters in an epic RPG adventure.</p>
                    </div>

                </div>
            </div>

            <div class="rightcolumn"></div>

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
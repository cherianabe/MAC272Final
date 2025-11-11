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
        Consoles
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
        <h2>Consoles</h2>
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
                        <img src="images/consoles/xboxseriess.jpg" alt="Xbox Series S">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Xbox Series S</h3>
                        <p class="productprice">$289.99</p>
                        <button class="addcart" onclick="addToCart('Xbox Series S', 289.99, 'consoles')">Add to cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">The Xbox Series S is a compact, next-gen console offering fast load times and 1440p gaming with 120 FPS support. It's a budget-friendly option with access to Game Pass, providing an affordable way to enjoy next-gen gaming.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/consoles/xboxseriesx.jpg" alt="Xbox Series X">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Xbox Series X</h3>
                        <p class="productprice">$479.99</p>
                        <button class="addcart" onclick="addToCart('Xbox Series X', 479.99, 'consoles')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">The Xbox Series X is the most powerful Xbox console, delivering 4K gaming at 60 FPS, with support for up to 120 FPS. It offers quick load times, a vast library, and enhanced performance, making it ideal for next-gen gaming.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/consoles/playstation5digitaledition.jpg" alt="PlayStation 5 Digital Edition">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">PlayStation 5 Digital Edition</h3>
                        <p class="productprice">$429.99</p>
                        <button class="addcart" onclick="addToCart('PlayStation 5 Digital Edition', 429.99, 'consoles')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">The PS5 Digital Edition offers the full next-gen PlayStation experience without a disc drive. Enjoy ultra-fast loading, 4K visuals, and an immersive gaming experience with digital downloads. It's a sleek, more affordable alternative for digital-first gamers.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/consoles/playstation5gamediscedition.jpg" alt="PlayStation 5 Game Disc Edition">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">PlayStation 5 Game Disc Edition</h3>
                        <p class="productprice">$449.99</p>
                        <button class="addcart" onclick="addToCart('PlayStation 5 Game Disc edition', 449.99, 'consoles')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">The PS5 Game Disc Edition features powerful next-gen hardware, including 4K visuals, fast load times, and immersive gameplay. With a disc drive for physical games, it offers flexibility for digital and physical media, making it ideal for traditional gamers.</p>
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
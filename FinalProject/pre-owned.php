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
        Pre-Owned
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
        <h2>Pre-Owned</h2>
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
                        <img src="images/preowned/battlefield2042.jpg" alt="BattleField 2042">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">BattleField 2042</h3>
                        <p class="productprice">4.99</p>
                        <mark>Pre-Owned</mark>
                        <button class="addcart" onclick="addToCart('BattleField 2042', 4.99, 'preowned')">Add to cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Battlefield 2042 delivers large-scale, multiplayer warfare with dynamic environments and intense combat. Set in a near-future world, players engage in epic battles across vast maps, utilizing futuristic weapons, vehicles, and gadgets in a fast-paced, team-based experience.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/preowned/goatsimulator3.jpg" alt="Goat Simulator 3">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Goat Simulator 3</h3>
                        <p class="productprice">$17.99</p>
                        <mark>Pre-Owned</mark>
                        <button class="addcart" onclick="addToCart('Goat Simulator 3', 17.99, 'preowned')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Goat Simulator 3 offers chaotic, sandbox fun as players control a mischievous goat in an open world. Explore vibrant environments, cause havoc, and complete absurd challenges, all with hilarious physics-based gameplay and a quirky sense of humor.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/preowned/blackmythwukong.jpg" alt="Black Myth: Wukong">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Black Myth Wukong</h3>
                        <p class="productprice">$59.99</p>
                        <mark>Pre-Owned</mark>
                        <button class="addcart" onclick="addToCart('Black Myth: Wukong', 59.99, 'preowned')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Black Myth: Wukong is an action RPG inspired by Chinese mythology. Players control Sun Wukong, the legendary Monkey King, in a beautifully crafted world. With fast-paced combat, magic, and mythological creatures, it promises an epic adventure full of intrigue and challenges.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/preowned/untildawn.jpg" alt="Until Dawn">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Until Dawn</h3>
                        <p class="productprice">$37.99</p>
                        <mark>Pre-Owned</mark>
                        <button class="addcart" onclick="addToCart('Until Dawn', 37.99, 'preowned')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription"> Until Dawn is an interactive horror game where players control eight friends stranded in a remote mountain lodge. Choices affect the storyline as players must navigate suspenseful scenarios, trying to survive terrifying supernatural threats in this cinematic, branching narrative</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/preowned/astrobot.jpg" alt="Astro Bot">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Astro Bot</h3>
                        <p class="productprice">$54.99</p>
                        <mark>Pre-Owned</mark>
                        <button class="addcart" onclick="addToCart('Astro Bot', 54.99, 'preowned')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Astro Bot is a charming, platformer game where players control Astro, a small robot on a quest to rescue his friends. With vibrant worlds, creative level design, and intuitive motion controls, it offers a delightful VR experience for all ages</p>
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
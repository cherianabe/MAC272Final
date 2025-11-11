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
        Xbox Games
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
        <h2>Xbox Games</h2>
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
                        <img src="images/xbox/fc25.jpg" alt="easportfc25">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">EA Sports FC 25</h3>
                        <p class="productprice">$34.99</p>
                        <button class="addcart" onclick="addToCart('FC 25', 34.99, 'xbox')">Add to cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">EA Sports FC 25 is a dynamic soccer video game featuring realistic gameplay, advanced AI, and enhanced visuals. With updated teams, stadiums, and game modes, it offers an immersive football experience for fans, focusing on tactical play, player customization, and exciting online competition.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/xbox/starwarsOutlaws.jpg" alt="starwarsOutlaws">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Star Wars Outlaws</h3>
                        <p class="productprice">$60.99</p>
                        <button class="addcart" onclick="addToCart('Starwars Outlaws', 60.99, 'xbox')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription"> Star Wars Outlaws is an open-world action-adventure set in the Star Wars universe. Play as Kay Vess, a smuggler navigating a galaxy teeming with danger. Evade the Empire, make allies, and explore iconic locations while crafting your own adventure in the criminal underworld of the galaxy.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/xbox/haloinfinite.jpg" alt="haloInfinite">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Halo Infinite</h3>
                        <p class="productprice">$59.99</p>
                        <button class="addcart" onclick="addToCart('Halo Infinite', 59.99, 'xbox')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Halo Infinite follows Master Chief as he battles the Banished on a damaged Halo ring. The game features an expansive open-world campaign with new abilities, weapons, and vehicles, as well as a rich multiplayer experience. It is a fresh chapter in the iconic Halo saga, with both solo and competitive modes.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/xbox/gears5.jpg" alt="gears5">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Gears 5</h3>
                        <p class="productprice">$30.99</p>
                        <button class="addcart" onclick="addToCart('Gears 5', 30.99, 'xbox')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription"> Gears 5 centers on Kait Diaz as she uncovers the truth about her heritage while fighting the Swarm. The third-person shooter offers intense combat, emotional storytelling, and various multiplayer modes, including Horde and Escape.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/xbox/starfield.jpg" alt="Starfield">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Starfield</h3>
                        <p class="productprice">$69.99</p>
                        <button class="addcart" onclick="addToCart('Starfield', 69.99, 'xbox')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Starfield is a space exploration RPG where players venture through a vast universe of planets, space stations, and ancient mysteries. Create your own character, engage in space combat, and explore deep narratives. The game offers a rich, immersive experience with endless opportunities for discovery in a sprawling, open-world cosmos.</p>

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
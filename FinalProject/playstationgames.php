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
        PlayStation Games
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
        <h2>PlayStation Games</h2>
        <br>
        <br>
        <hr>
        <br>
    </div>

    <div class="maincontent">
        <div class="columns">
            <div class="leftcolumn">
                <p>Text</p>
            </div>

            <div class="middlecolumn">
                <div class="product">
                    <div class="productimage">
                        <img src="images/playstation/demonssouls.jpg" alt="Demon's souls">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Demon's Souls</h3>
                        <p class="productprice">$49.99</p>
                        <button class="addcart" onclick="addToCart('Demons Souls', 49.99, 'playstation')">Add to cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Demon's Souls is a stunning remake of the original action RPG. Players explore dark, treacherous environments, battling ruthless enemies and bosses. With improved visuals and refined combat, this remake delivers a brutal and immersive experience while maintaining the original's difficulty.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/playstation/rachetandclank.jpg" alt="Rachet and Clank">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Rachet and Clank: Rift Apart</h3>
                        <p class="productprice">$37.99</p>
                        <button class="addcart" onclick="addToCart('Rachet and Clank', 37.99, 'playstation')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Ratchet & Clank: Rift Apart brings players on a thrilling, dimension-hopping adventure. The game uses the PS5's SSD to allow seamless transitions between worlds, featuring fast-paced combat, vibrant settings, and inventive weapons as Ratchet and Clank stop a multiverse-threatening villain.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/playstation/returnal.jpg" alt="Returnal">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Returnal</h3>
                        <p class="productprice">$27.99</p>
                        <button class="addcart" onclick="addToCart('Returnal', 27.99, 'playstation')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Returnal is a roguelike third-person shooter following Selene, trapped on a hostile alien planet. Each death resets her journey with random encounters. Combining fast-paced combat, psychological horror, and deep narrative elements, it delivers a unique and intense gaming experience on PS5.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/playstation/horizonforbiddenwest.jpg" alt="Horizon Forbidden">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Horizon Forbidden West</h3>
                        <p class="productprice">$29.99</p>
                        <button class="addcart" onclick="addToCart('Horizon Forbidden West', 29.99, 'playstation')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription">Horizon Forbidden West continues Aloy's journey through an expansive, post-apocalyptic world. Players battle mechanical creatures and uncover secrets in stunning landscapes. This open-world RPG offers exciting combat, a rich story, and impressive visuals, making it a must-play PS5 title.</p>
                    </div>
                </div>

                <div class="product">
                    <div class="productimage">
                        <img src="images/playstation/finalfantasyXVI.jpg" alt="Final Fantasy XVI">
                    </div>

                    <div class="productdescription">
                        <h3 class="productname">Final Fantasy XVI</h3>
                        <p class="productprice">$27.99</p>
                        <button class="addcart" onclick="addToCart('Final Fantasy XVI', 27.99, 'playstation')">Add to Cart</button>
                    </div>

                    <div class="gamedes">
                        <p class="paradescription"> Final Fantasy XVI transports players to the dark world of Valisthea, where conflict and political intrigue shape the fate of nations. With real-time combat, a gripping story, and epic visuals, it's an immersive, action-packed RPG exclusive to PS5.</p>
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
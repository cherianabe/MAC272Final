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

    <div class="logout-info">
        <?php 
            // Logic to count items in the session cart
            $cart_count = 0;
            if(isset($_SESSION['cart'])) {
                $cart_count = array_sum($_SESSION['cart']);
            }
        ?>
        
        <button><a href="cart.php" class="cart-icon">🛒 (<?php echo $cart_count; ?>)</a></button>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <button><a href="logout.php">Log Out</a></button>
        <?php else: ?>
            <button><a href="login.php">Log In</a></button>
            <button><a href="signup.php">Sign Up</a></button>
        <?php endif; ?>
    </div>
</nav>
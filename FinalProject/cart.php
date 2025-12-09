<?php
session_start();
require_once 'connection.php';

// 1. SECURITY: Kick out guests
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// 2. ADD TO CART LOGIC
// If a user clicked a button like <a href="cart.php?add=5">
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    
    // Create the cart array if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product ID to the session cart
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++; // If already in cart, add 1 more
    } else {
        $_SESSION['cart'][$id] = 1; // If not, set to 1
    }
    
    // REDIRECT LOGIC: Go back to the previous page (Shop More)
    if(isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // If we don't know where they came from, go Home
        header("Location: home.php");
    }
    exit;
}

// 3. REMOVE FROM CART LOGIC
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart - Game Zone</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cart-table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
            color: black; 
            margin-top: 20px; 
        }
        .cart-table th, .cart-table td { 
            padding: 15px; 
            border-bottom: 1px solid #ddd; 
            text-align: left; 
        }
        .cart-table th { 
            background-color: #FF6F61; 
            color: white; 
        }
        .total-box { 
            text-align: right; 
            font-size: 20px; 
            color: #FFEB3B; 
            margin-top: 20px; 
            font-family: monospace; 
        }
        .btn-checkout { 
            background-color: #66FF00; 
            color: black; 
            padding: 10px 20px; 
            text-decoration: none; 
            font-weight: bold; 
        }
    </style>
</head>

<body class="mainbody">
    
    <?php include 'navbar.php'; ?>

    <div class="maincontent" style="padding: 50px;">
        <h2 style="color: #FFEB3B; border-bottom: 2px solid white; padding-bottom: 10px;">Your Shopping Cart</h2>

        <?php
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<h3 style='color:white; text-align:center; margin-top:50px;'>Your cart is empty! 🛒</h3>";
            echo "<div style='text-align:center'><a href='home.php' style='color:#FFEB3B'>Go Shopping</a></div>";
        } else {
            echo '<table class="cart-table">';
            echo '<tr><th>Product</th><th>Price</th><th>Qty</th><th>Total</th><th>Action</th></tr>';

            $grand_total = 0;
            
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $sql = "SELECT * FROM products WHERE id = $product_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    $price = ($row['saleprice'] > 0) ? $row['saleprice'] : $row['price'];
                    $line_total = $price * $quantity;
                    $grand_total += $line_total;

                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>$" . $price . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>$" . $line_total . "</td>";
                    echo "<td><a href='cart.php?remove=" . $product_id . "' style='color:red;'>Remove</a></td>";
                    echo "</tr>";
                }
            }
            echo '</table>';

            echo '<div class="total-box">';
            echo '<p>Total: $' . number_format($grand_total, 2) . '</p>';
            echo '<br>';
            echo '<a href="checkout.php" class="btn-checkout">PAY NOW</a>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
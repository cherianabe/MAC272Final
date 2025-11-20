<?php
session_start();
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hot Deals - Game Zone</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
</head>
<body class="mainbody">

    <?php include 'navbar.php'; ?>

    <div class="mainheader">
        <br><br>
        <h1 style="color:#FFEB3B; text-align:center;">🔥 Hot Deals 🔥</h1>
        <br><br>
        <hr>
        <br>
    </div>

    <div class="maincontent">
        <div class="columns">
            <div class="leftcolumn"></div>

            <div class="middlecolumn">
                <?php
                $sql = "SELECT * FROM products WHERE saleprice > 0"; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="product" style="border: 2px solid #FF3B30;">
                            <div class="productimage">
                                <img src="<?php echo $row['imageurl']; ?>" alt="<?php echo $row['name']; ?>">
                            </div>

                            <div class="productdescription">
                                <h3 class="productname"><?php echo $row['name']; ?></h3>
                                
                                <p class="productprice" style="text-decoration:line-through; color:gray;">$<?php echo $row['price']; ?></p>
                                <p class="productprice" style="color:red; font-size:20px;">NOW: $<?php echo $row['saleprice']; ?></p>

                                <?php 
                                    $savings = $row['price'] - $row['saleprice'];
                                    echo '<p style="color:#66FF00; font-size:14px;">You Save: $' . number_format($savings, 2) . '</p>';
                                ?>

                                <?php if($row['quantity'] > 0): ?>
                                    <a href="cart.php?add=<?php echo $row['id']; ?>" class="addcart" style="display:block; text-align:center; text-decoration:none; padding-top:10px;">Grab Deal!</a>
                                    <p style="font-size:12px; color:black; margin-top:5px;">In Stock: <?php echo $row['quantity']; ?></p>
                                <?php else: ?>
                                    <button class="addcart" style="background-color:grey;" disabled>Sold Out</button>
                                <?php endif; ?>
                            </div>

                            <div class="gamedes">
                                <p class="paradescription"><?php echo $row['description']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p style='color:white; text-align:center;'>No active deals right now.</p>";
                }
                ?>
            </div>

            <div class="rightcolumn"></div>
        </div>
    </div>

    <div class="footermain">
        <br><hr><br>
        <footer>
            <p>&copy; 2025 Game Zone. All rights reserved.</p>
        </footer>
        <br>
    </div>
    <script src="javascript/javascript.js"></script>
</body>
</html>
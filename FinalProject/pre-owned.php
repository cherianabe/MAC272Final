<?php
session_start();
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-Owned Games - Game Zone</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
</head>
<body class="mainbody">

    <?php include 'navbar.php'; ?> 

    <div class="mainheader">
        <br><br>
        <h2 style="color:#FFEB3B; text-align:center;">Pre-Owned Collection</h2>
        <p style="color:white; text-align:center;">High quality used games at low prices.</p>
        <br><br>
        <hr>
        <br>
    </div>

    <div class="maincontent">
        <div class="columns">
            <div class="leftcolumn"></div>

            <div class="middlecolumn">
                <?php
                $sql = "SELECT * FROM products WHERE ispreowned = 1"; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="product">
                            <div class="productimage">
                                <img src="<?php echo $row['imageurl']; ?>" alt="<?php echo $row['name']; ?>">
                            </div>

                            <div class="productdescription">
                                <h3 class="productname"><?php echo $row['name']; ?></h3>
                                
                                <?php if ($row['saleprice'] > 0): ?>
                                    <p class="productprice" style="text-decoration:line-through; color:gray;">$<?php echo $row['price']; ?></p>
                                    <p class="productprice" style="color:red;">$<?php echo $row['saleprice']; ?></p>
                                <?php else: ?>
                                    <p class="productprice">$<?php echo $row['price']; ?></p>
                                <?php endif; ?>

                                <mark style="background-color:#FFEB3B; padding:3px; border-radius:3px; font-size:12px;">Pre-Owned</mark>

                                <?php if($row['quantity'] > 0): ?>
                                    <a href="cart.php?add=<?php echo $row['id']; ?>" class="addcart" style="display:block; text-align:center; text-decoration:none; padding-top:10px; margin-top:10px;">Add to Cart</a>
                                    <p style="font-size:12px; color:black; margin-top:5px;">In Stock: <?php echo $row['quantity']; ?></p>
                                <?php else: ?>
                                    <button class="addcart" style="background-color:grey; margin-top:10px;" disabled>Out of Stock</button>
                                <?php endif; ?>
                            </div>

                            <div class="gamedes">
                                <p class="paradescription"><?php echo $row['description']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p style='color:white; text-align:center;'>No pre-owned games available.</p>";
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
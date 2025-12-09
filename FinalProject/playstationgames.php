<?php
session_start();
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Xbox Games</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
</head>

<body class="mainbody">
    
    <?php include 'navbar.php'; ?>

    <div class="mainheader">
        <br><br>
        <h2>🎮 PlayStation 🎮</h2>
        <br><br>
        <hr>
        <br>
    </div>

    <div class="maincontent">
        <div class="columns">
            <div class="leftcolumn"></div>

            <div class="middlecolumn">
                
                <?php
                //Get only Xbox Games
                $sql = "SELECT * FROM products WHERE platform = 'playstation' and category = 'game' and ispreowned = 0 and saleprice = 0";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //loop to display the games - consoles - deals - pre-owned
                    while($row = $result->fetch_assoc()) {
                        ?>
                        
                        <div class="product">
                            <div class="productimage">
                                <img src="<?php echo $row['imageurl']; ?>" alt="<?php echo $row['name']; ?>">
                            </div>

                            <div class="productdescription">
                                <h3 class="productname"><?php echo $row['name']; ?></h3>

                                <?php
                                if ($row['saleprice'] > 0) {

                                    echo '<p class="productprice" style="text-decoration:line-through; color:gray;">$' . $row['price'] . '</p>';
                                    echo '<p class="productprice" style="color:red;">$' . $row['saleprice'] . '</p>';
                                } else {
                                    echo '<p class="productprice">$' . $row['price'] . '</p>';
                                }

                                if ($row['quantity'] > 0) {
                                    echo '<a href="cart.php?add=' . $row['id'] . '" class="addcart" style="display:block; text-align:center; text-decoration:none; padding-top:10px;">Add to Cart</a>';
                                    echo '<p style="font-size:12px; color:black; margin-top:5px;">In Stock: ' . $row['quantity'] . '</p>';
                                } else {
                                    echo '<button class="addcart" style="background-color:grey; cursor:not-allowed;" disabled>Out of Stock</button>';
                                }
                                ?>
                            </div>

                            <div class="gamedes">
                                <p class="paradescription"><?php echo $row['description']; ?></p>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "<p style='color:white; text-align:center'>No Xbox games found in database.</p>";
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
            <p>Contact us at: <a href="mailto:gamezone@outlook.com">gamezone@outlook.com</a></p>
        </footer>
        <br>
    </div>

    <script src="javascript/javascript.js"></script>
</body>
</html>
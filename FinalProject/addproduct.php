<?php
session_start();
require_once 'connection.php';

// Security Check
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $saleprice = $_POST['saleprice'];
    $platform = $_POST['platform'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
    $imageurl = $_POST['imageurl'];
    
    $ispreowned = isset($_POST['ispreowned']) ? 1 : 0;

    $sql = "INSERT INTO products (name, price, saleprice, platform, category, quantity, imageurl, ispreowned, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sddssissi", $name, $price, $saleprice, $platform, $category, $quantity, $imageurl, $ispreowned, $description);
    
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="mainbody">
    <?php include 'navbar.php'; ?>
    
    <div class="form-container" style="width: 600px; margin-top: 50px;">
        <h2>Add New Product</h2>
        <form method="POST" action="add_product.php">
            
            <label style="display:block; text-align:left;">Name:</label>
            <input type="text" name="name" placeholder="Game Name" required>
            
            <label style="display:block; text-align:left;">Image URL:</label>
            <input type="text" name="imageurl" placeholder="Paste image link here" required>
            
            <label style="display:block; text-align:left;">Description:</label>
            <textarea name="description" placeholder="Enter game description..." style="width:100%; height:100px; padding:10px; margin-bottom:15px;" required></textarea>
            
            <div style="display:flex; gap:10px;">
                <div style="width:50%;">
                    <label style="display:block; text-align:left;">Price ($):</label>
                    <input type="number" step="0.01" name="price" placeholder="0.00" required>
                </div>
                <div style="width:50%;">
                    <label style="display:block; text-align:left;">Sale Price ($):</label>
                    <input type="number" step="0.01" name="saleprice" value="0.00">
                </div>
            </div>

            <div style="display:flex; gap:10px;">
                <div style="width:50%;">
                    <label style="display:block; text-align:left;">Platform:</label>
                    <select name="platform" style="width:100%; padding:10px; margin-bottom:15px;">
                        <option value="Xbox">Xbox</option>
                        <option value="PlayStation">PlayStation</option>
                        <option value="Nintendo">Nintendo</option>
                    </select>
                </div>
                
                <div style="width:50%;">
                    <label style="display:block; text-align:left;">Category:</label>
                    <select name="category" style="width:100%; padding:10px; margin-bottom:15px;">
                        <option value="Game">Game</option>
                        <option value="Console">Console</option>
                    </select>
                </div>
            </div>

            <div style="display:flex; gap:10px; align-items:center; margin-bottom:15px;">
                <div style="width:100px;">
                    <label style="display:block; text-align:left;">Quantity:</label>
                    <input type="number" name="quantity" value="10" style="margin-bottom:0;">
                </div>
                
                <div style="margin-left:20px; padding-top:20px;">
                    <label>
                        <input type="checkbox" name="ispreowned" style="width:auto;"> 
                        Is Pre-Owned?
                    </label>
                </div>
            </div>

            <button type="submit">Add Product</button>
        </form>
        <p><a href="admin.php">Cancel</a></p>
    </div>
</body>
</html>
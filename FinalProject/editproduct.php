<?php
session_start();
require_once 'connection.php';

// Security Check
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// 1. UPDATE LOGIC (When you click "Update Product")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $saleprice = $_POST['saleprice'];
    $platform = $_POST['platform'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    
    // FIX 1: Get the value from the form using 'imageurl'
    $image_url = $_POST['imageurl']; 
    
    $ispreowned = isset($_POST['ispreowned']) ? 1 : 0;

    // FIX 2: Update the SQL query to use the column 'imageurl'
    $sql = "UPDATE products SET name=?, price=?, saleprice=?, platform=?, category=?, quantity=?, imageurl=?, description=?, ispreowned=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters (s=string, d=decimal, i=integer)
    // Notice $image_url is the 7th item here, matching the 7th ? above
    $stmt->bind_param("sddssissii", $name, $price, $saleprice, $platform, $category, $quantity, $image_url, $description, $ispreowned, $id);
    
    if($stmt->execute()){
        header("Location: admin.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// 2. FETCH DATA LOGIC (When you first load the page)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // We select * so we get 'imageurl' from the DB
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    
    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="mainbody">
    
    <?php include 'navbar.php'; ?>
    
    <div class="form-container" style="width: 500px; margin-top: 50px;">
        <h2>Edit Product</h2>
        
        <form method="POST" action="editproduct.php">
            
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            
            <label style="display:block; text-align:left;">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            
            <label style="display:block; text-align:left;">Image URL:</label>
            <input type="text" name="imageurl" value="<?php echo htmlspecialchars($product['imageurl']); ?>" required>
            
            <label style="display:block; text-align:left;">Description:</label>
            <textarea name="description" style="width:100%; height:100px; padding:10px; margin-bottom:15px;" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            
            <div style="display:flex; gap:10px;">
                <div>
                    <label>Price:</label>
                    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
                </div>
                <div>
                    <label>Sale Price:</label>
                    <input type="number" step="0.01" name="saleprice" value="<?php echo $product['saleprice']; ?>">
                </div>
            </div>

            <div style="display:flex; gap:10px;">
                <select name="platform" style="width:50%; padding:10px; margin-bottom:15px;">
                    <option value="Xbox" <?php if($product['platform']=='Xbox') echo 'selected'; ?>>Xbox</option>
                    <option value="PlayStation" <?php if($product['platform']=='PlayStation') echo 'selected'; ?>>PlayStation</option>
                    <option value="Nintendo" <?php if($product['platform']=='Nintendo') echo 'selected'; ?>>Nintendo</option>
                </select>
                
                <select name="category" style="width:50%; padding:10px; margin-bottom:15px;">
                    <option value="Game" <?php if($product['category']=='Game') echo 'selected'; ?>>Game</option>
                    <option value="Console" <?php if($product['category']=='Console') echo 'selected'; ?>>Console</option>
                </select>
            </div>

            <div style="display:flex; gap:10px; align-items:center; margin-bottom:15px;">
                <label>Qty:</label>
                <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" style="width:80px; margin-bottom:0;">
                
                <label>
                    <input type="checkbox" name="ispreowned" style="width:auto;" <?php if($product['ispreowned']==1) echo 'checked'; ?>> 
                    Is Pre-Owned?
                </label>
            </div>

            <button type="submit">Update Product</button>
        </form>
        <p><a href="admin.php">Cancel</a></p>
    </div>
</body>
</html>
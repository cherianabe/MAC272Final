<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Delete User Logic
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: admin.php");
}

// Delete Product Logic
if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Embedded CSS for Admin Table Layout */
        .admin-wrapper { padding: 50px; color: black; }
        .styled-table { width: 100%; border-collapse: collapse; background: white; margin: 25px 0; box-shadow: 0 0 20px rgba(0,0,0,0.15); }
        .styled-table th, .styled-table td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        .styled-table th { background-color: #FF6F61; color: white; }
        .btn-action { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; margin-right: 5px; font-size: 14px; }
        .btn-edit { background-color: green; }
        .btn-delete { background-color: red; }
        .btn-add { background-color: #333; color: #FFEB3B; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 5px; display: inline-block; margin-bottom: 10px;}
    </style>
</head>
<body class="mainbody">
    
    <?php include 'navbar.php'; ?>

    <div class="admin-wrapper">
        
        <h2 style="color: #FFEB3B; border-bottom: 2px solid white;">Manage Users</h2>
        <table class="styled-table">
            <thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Email</th><th>Password</th><th>Role</th><th>Actions</th></tr></thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM users");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['lastname']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['role']."</td>
                    <td>
                        <a href='edit_user.php?id=".$row['id']."' class='btn-action btn-edit'>Edit</a>
                        <a href='admin.php?delete_user=".$row['id']."' class='btn-action btn-delete' onclick='return confirm(\"Delete User?\")'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>

        <br><br>

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 style="color: #FFEB3B; border-bottom: 2px solid white;">Manage Products</h2>
            <a href="addproduct.php" class="btn-add">+ Add New Product</a>
        </div>
        
        <table class="styled-table">
            <thead>
                <tr><th>ID</th><th>Name</th><th>Price</th><th>Sale Price</th><th>Platform</th><th>Category</th><th>Is pre-owned?</th><th>Stock</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            // Note: using your new column names 'saleprice'
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>$".$row['price']."</td>
                    <td>$".$row['saleprice']."</td>
                    <td>".$row['platform']."</td>
                    <td>".$row['category']."</td>
                    <td>".$row['ispreowned']."</td>
                    <td>".$row['quantity']."</td>
                    <td>
                        <a href='editproduct.php?id=".$row['id']."' class='btn-action btn-edit'>Edit</a>
                        <a href='admin.php?deleteproduct=".$row['id']."' class='btn-action btn-delete' onclick='return confirm(\"Delete Product?\")'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</body>
</html>
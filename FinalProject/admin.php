<?php
session_start();
require_once 'connection.php';

// Security Check
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
        /* Embedded CSS just for Admin Panel to ensure it loads */
        .admin-wrapper {
            padding: 100px 20px; /* Space for fixed navbar */
            max-width: 1000px;
            margin: 0 auto;
        }

        h2 {
            color: #FF6F61;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-top: 40px;
            font-family: monospace;
            font-size: 24px;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            background-color: white;
        }

        .styled-table thead tr {
            background-color: #FF6F61;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #FF6F61;
        }

        .btn-action {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-right: 5px;
        }

        .edit-btn {
            background-color: #4CAF50; /* Green */
            color: white;
        }

        .delete-btn {
            background-color: #FF3B30; /* Red */
            color: white;
        }

        .edit-btn:hover { background-color: #45a049; }
        .delete-btn:hover { background-color: #d32f2f; }
    </style>
</head>
<body class="mainbody">
    
    <nav class="navbar">
        <div class="weblogo">
            <span style="color:white; font-size:24px; font-weight:bold; font-family:monospace;">ADMIN PANEL</span>
        </div>
        <div class="logout-info">
            <span>Welcome, Admin</span>
            <button><a href="logout.php">Log Out</a></button>
        </div>
    </nav>

    <div class="admin-wrapper">
        <h2>Manage Users</h2>
        <table class="styled-table">
            <thead>
                <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Email</th><th>Password</th><th>Role</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM users");
            if ($result->num_rows > 0) {
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
                            <a href='edit_user.php?id=".$row['id']."' class='btn-action edit-btn'>Edit</a>
                            <a href='admin.php?delete_user=".$row['id']."' class='btn-action delete-btn' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
            </tbody>
        </table>

        <h2>Manage Products</h2>
        <table class="styled-table">
            <thead>
                <tr><th>ID</th><th>Name</th><th>Price</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT * FROM products");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>$".$row['price']."</td>
                        <td>
                            <a href='admin.php?delete_product=".$row['id']."' class='btn-action delete-btn' onclick='return confirm(\"Delete this product?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</body>
</html>
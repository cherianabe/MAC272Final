<?php
session_start();
require_once 'connection.php';

// Must be logged in and have items
if (!isset($_SESSION['loggedin']) || empty($_SESSION['cart'])) {
    header("Location: home.php");
    exit;
}

// Loop through cart and subtract stock
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    // Logic: Update products, set quantity = quantity - sold_amount, WHERE id matches
    $sql = "UPDATE products SET quantity = quantity - ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $product_id);
    $stmt->execute();
    $stmt->close();
}

// Empty the cart
unset($_SESSION['cart']);

// Redirect to a Thank You page
echo "<script>alert('Thank you for your purchase! Stock updated.'); window.location.href='home.php';</script>";
?>
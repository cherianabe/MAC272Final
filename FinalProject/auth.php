<?php
session_start();

$users = [
    "Sergio" => "12345",
    "Cherian" => "67890",
    "MAC272" => "php"
];
// ----------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; 

        header("Location: home.php");
        exit;

    } else {
        $error = "Invalid username or password";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
?>
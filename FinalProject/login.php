<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: home.php");
        }
        exit;
    } else {
        $error = "Invalid info";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Game Zone</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="mainbody">
    
    <div class="form-container">
        <h2>Login to Game Zone</h2>
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>No account? <a href="signup.php">Sign Up</a></p>
        <p><a href="home.php">Back to Home</a></p>
    </div>

</body>
</html>
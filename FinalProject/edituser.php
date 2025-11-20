<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET firstname=?, lastname=?, username=?, email=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $firstname, $lastname, $username, $email, $password, $id);
    $stmt->execute();
    
    header("Location: admin.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="mainbody">
    <div class="form-container">
        <h2>Edit User</h2>
        <form method="POST" action="edituser.php">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label style="text-align:left; display:block; color:#333;">First Name</label>
            <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>" required>
            <label style="text-align:left; display:block; color:#333;">Last Name</label>
            <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>" required>
            <label style="text-align:left; display:block; color:#333;">Username</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
            <label style="text-align:left; display:block; color:#333;">Email</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <label style="text-align:left; display:block; color:#333;">Password</label>
            <input type="text" name="password" value="<?php echo $user['password']; ?>" required>
            <button type="submit">Update User</button>
        </form>
        <p><a href="admin.php">Cancel</a></p>
    </div>
</body>
</html>
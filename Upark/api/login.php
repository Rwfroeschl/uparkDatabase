<?php
session_start();
include 'config.php';  // Include database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // SQL to fetch the user by email
    $sql = "SELECT UserID, Name, Password FROM Users WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check password and start session
    if ($user && password_verify($password, $user['Password'])) {
        $_SESSION['user_id'] = $user['UserID'];
        $_SESSION['user_name'] = $user['Name'];
        echo "Logged in successfully";
    } else {
        echo "Invalid login credentials";
    }
}
?>
<!-- Simple HTML form for login -->
<form method="post" action="login.php">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

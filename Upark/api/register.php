<?php
include 'config.php';  // Include database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $userType = htmlspecialchars($_POST['userType']);  // Assuming userType is passed

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL to insert new user
    $sql = "INSERT INTO Users (Name, Email, Password, UserType) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $hashedPassword, $userType]);

    echo "User registered successfully!";
}
?>
<!-- Simple HTML form for registration -->
<form method="post" action="register.php">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    User Type: <input type="text" name="userType" required><br>
    <input type="submit" value="Register">
</form>

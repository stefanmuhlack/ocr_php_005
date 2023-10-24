<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT password_hash FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($password_hash);
    $stmt->fetch();

    if (password_verify($password, $password_hash)) {
        // Password is correct, start a session or set a cookie
        // TODO: Implement session or cookie logic here
        echo "Login successful!";
    } else {
        echo "Invalid credentials!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Basic login form -->
<form action="login.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>

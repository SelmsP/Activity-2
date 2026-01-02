<?php
session_start();

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = hash("sha256", $_POST["password"]);

    if (isset($_SESSION["users"][$username]) && $_SESSION["users"][$username] === $password) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p>No account yet? <a href="signup.php">Sign Up</a></p>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = hash("sha256", $_POST["password"]);

    if (isset($_SESSION["users"][$username])) {
        $error = "Username already exists";
    } else {
        $_SESSION["users"][$username] = $password;
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h2>Sign Up</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login</a></p>

</body>
</html>

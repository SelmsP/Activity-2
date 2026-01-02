<?php
require "auth.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
<p>You are successfully logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>

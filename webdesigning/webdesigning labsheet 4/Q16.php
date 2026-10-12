
<?php
if (isset($_GET["reset"])) {
    setcookie("username", "", time() - 3600, "/");
    header("Location: Q16.php");
    exit;
}

if (!isset($_COOKIE["username"])) {
    setcookie("username", "Divyanshi", time() + 3600, "/");
    header("Location: Q16.php");
    exit;
}

$username = $_COOKIE["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Cookies</title>
</head>
<body>
    <h2>PHP Cookie Example</h2>

    <p>
        Welcome,
        <?php echo htmlspecialchars($username); ?>!
    </p>

    <p>Cookie is stored in your browser for one hour.</p>

    <a href="Q16.php?reset=1">Delete Cookie</a>
</body>
</html>

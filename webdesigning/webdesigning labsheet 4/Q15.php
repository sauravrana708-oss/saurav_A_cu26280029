
<?php
session_start();

if (isset($_GET["reset"])) {
    $_SESSION = [];
    session_destroy();
    header("Location: Q15.php");
    exit;
}

if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "Divyanshi";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Session</title>
</head>
<body>
    <h2>PHP Session Example</h2>

    <p>
        Welcome,
        <?php echo htmlspecialchars($_SESSION["username"]); ?>!
    </p>

    <p>
        Session ID:
        <?php echo htmlspecialchars(session_id()); ?>
    </p>

    <a href="Q15.php?reset=1">Reset Session</a>
</body>
</html>

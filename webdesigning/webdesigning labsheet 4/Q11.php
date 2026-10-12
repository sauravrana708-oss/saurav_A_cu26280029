
<!DOCTYPE html>
<html>
<head>
    <title>Server Information</title>
</head>
<body>
    <h2>Server Information</h2>

    <?php
    echo "<p><b>Server Name:</b> " .
        htmlspecialchars($_SERVER['SERVER_NAME']) . "</p>";

    echo "<p><b>Server Software:</b> " .
        htmlspecialchars($_SERVER['SERVER_SOFTWARE']) . "</p>";

    echo "<p><b>Server Protocol:</b> " .
        htmlspecialchars($_SERVER['SERVER_PROTOCOL']) . "</p>";

    echo "<p><b>Request Method:</b> " .
        htmlspecialchars($_SERVER['REQUEST_METHOD']) . "</p>";

    echo "<p><b>PHP File:</b> " .
        htmlspecialchars($_SERVER['PHP_SELF']) . "</p>";
    ?>
</body>
</html>

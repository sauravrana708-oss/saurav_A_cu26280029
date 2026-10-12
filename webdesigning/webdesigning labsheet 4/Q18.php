
<!DOCTYPE html>
<html>
<head>
    <title>Apache Server Logs</title>
</head>
<body>
    <h2>Apache Server Logs</h2>

    <?php
    $logDirectory = "E:/xampp/apache/logs/";

    echo "<p><b>Access Log:</b> "
        . htmlspecialchars($logDirectory . "access.log")
        . "</p>";

    echo "<p><b>Error Log:</b> "
        . htmlspecialchars($logDirectory . "error.log")
        . "</p>";

    echo "<p>Open the XAMPP Apache logs folder to view these files.</p>";
    ?>
</body>
</html>

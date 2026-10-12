
<!DOCTYPE html>
<html>
<head>
    <title>PHP Extensions</title>
</head>
<body>
    <h2>PHP Extension Status</h2>

    <?php
    $extensions = [
        "PDO" => extension_loaded("PDO"),
        "PDO MySQL" => extension_loaded("pdo_mysql"),
        "MySQLi" => extension_loaded("mysqli"),
        "File Information" => extension_loaded("fileinfo")
    ];

    foreach ($extensions as $name => $enabled) {
        echo "<p><b>" . htmlspecialchars($name) . ":</b> "
            . ($enabled ? "Enabled" : "Disabled")
            . "</p>";
    }
    ?>
</body>
</html>


<?php
$host = "localhost";
$dbname = "college_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    echo "Database connected successfully!";
} catch (PDOException $e) {
    echo "Database connection failed!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
    <h2>PHP MySQL Connection</h2>
</body>
</html>
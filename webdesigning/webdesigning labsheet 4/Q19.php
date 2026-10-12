
<?php
$host = "localhost";
$dbname = "college_db";
$username = "root";
$password = "";

$message = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->beginTransaction();

    $stmt = $pdo->prepare(
        "INSERT INTO students (name, email, age)
         VALUES (:name, :email, :age)"
    );

    $stmt->execute([
        ':name' => 'Transaction Student',
        ':email' => 'transaction@example.com',
        ':age' => 21
    ]);

    $pdo->commit();
    $message = "Transaction committed successfully!";

} catch (PDOException $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }

    $message = "Transaction failed. Changes rolled back.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PDO Transaction</title>
</head>
<body>
    <h2>Database Transaction</h2>
    <p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>

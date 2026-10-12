
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

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO students (name, email, age)
            VALUES (:name, :email, :age)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name' => 'Divyanshi',
        ':email' => 'divyanshi@example.com',
        ':age' => 20
    ]);

    echo "Student record inserted successfully!";
} catch (PDOException $e) {
    echo "Error inserting student record.";
}
?>

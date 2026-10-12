
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

    $sql = "UPDATE students
            SET email = :new_email
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':new_email' => 'divyanshi.updated@example.com',
        ':id' => 1
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Student email updated successfully!";
    } else {
        echo "No record updated. Check the student ID or email.";
    }

} catch (PDOException $e) {
    echo "Error updating student email.";
}
?>

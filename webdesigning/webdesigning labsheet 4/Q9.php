
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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

        if ($id === false || $id === null || $id < 1) {
            exit("Please enter a valid student ID.");
        }

        $stmt = $pdo->prepare(
            "DELETE FROM students WHERE id = :id"
        );

        $stmt->execute([':id' => $id]);

        echo $stmt->rowCount() > 0
            ? "Student record deleted successfully!"
            : "No student found with that ID.";
    }
} catch (PDOException $e) {
    echo "An error occurred while deleting the record.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
    <h2>Delete Student Record</h2>

    <form method="post">
        <label>Enter Student ID:</label>
        <input type="number" name="id" min="1" required>
        <button type="submit">Delete Student</button>
    </form>
</body>
</html>

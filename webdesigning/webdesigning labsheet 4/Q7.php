
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

    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Unable to retrieve student records.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>
    <h2>Student Records</h2>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>

        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= htmlspecialchars($student['id']) ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email'] ?? '') ?></td>
            <td><?= htmlspecialchars($student['age'] ?? '') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

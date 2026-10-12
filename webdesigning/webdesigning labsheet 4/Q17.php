
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

    if (isset($_GET["download"])) {
        $stmt = $pdo->query(
            "SELECT id, name, email, age FROM students"
        );

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=students.csv");

        $output = fopen("php://output", "w");
        fputcsv($output, ["ID", "Name", "Email", "Age"]);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit;
    }
} catch (PDOException $e) {
    die("Database connection failed.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export Student Records</title>
</head>
<body>
    <h2>Export Student Records</h2>
    <p>Click below to download student records as a CSV file.</p>

    <a href="Q17.php?download=1">
        <button type="button">Download CSV</button>
    </a>
</body>
</html>


<?php
session_start();

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

    // Create a demo user if it does not exist
    $email = "student@example.com";
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    
    // Create the users table if needed
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    )");

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if (!$stmt->fetch()) {
        $hash = password_hash("student123", PASSWORD_DEFAULT);
        $stmt = $pdo->prepare(
            "INSERT INTO users (email, password) VALUES (?, ?)"
        );
        $stmt->execute([$email, $hash]);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"] ?? "");
        $enteredPassword = $_POST["password"] ?? "";

        $stmt = $pdo->prepare(
            "SELECT id, password FROM users WHERE email = ?"
        );
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($enteredPassword, $user["password"])) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $message = "Login successful!";
        } else {
            $message = "Invalid email or password.";
        }
    }
} catch (PDOException $e) {
    $message = "Database error. Check your database connection.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>

    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>

    <p><?php echo htmlspecialchars($message); ?></p>

    <p>Demo email: student@example.com</p>
    <p>Demo password: student123</p>
</body>
</html>

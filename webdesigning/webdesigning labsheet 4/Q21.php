
<?php
$password = "MyPassword123";

$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$isVerified = password_verify(
    $password,
    $hashedPassword
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Hashing</title>
</head>
<body>
    <h2>Password Hashing and Verification</h2>

    <p>
        <b>Original Password:</b>
        <?php echo htmlspecialchars($password); ?>
    </p>

    <p>
        <b>Hashed Password:</b><br>
        <?php echo htmlspecialchars($hashedPassword); ?>
    </p>

    <p>
        <b>Password Verification:</b>
        <?php echo $isVerified ? "Successful" : "Failed"; ?>
    </p>
</body>
</html>

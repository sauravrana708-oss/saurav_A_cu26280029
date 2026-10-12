```php
<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Information</title>
</head>
<body>

    <h2>PHP Configuration Information</h2>

    <?php
    phpinfo();
    ?>

</body>
</html>
```
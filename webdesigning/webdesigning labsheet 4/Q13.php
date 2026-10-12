
<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_FILES["myfile"]) ||
        $_FILES["myfile"]["error"] !== UPLOAD_ERR_OK) {
        $message = "Please select a file to upload.";
    } else {
        $file = $_FILES["myfile"];
        $allowedTypes = ["image/jpeg", "image/png", "application/pdf"];
        $maxSize = 2 * 1024 * 1024;

        $fileType = mime_content_type($file["tmp_name"]);

        if (!in_array($fileType, $allowedTypes, true)) {
            $message = "Only JPG, PNG, and PDF files are allowed.";
        } elseif ($file["size"] > $maxSize) {
            $message = "File size must be 2 MB or less.";
        } else {
            $uploadDir = __DIR__ . "/uploads/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $extension = strtolower(
                pathinfo($file["name"], PATHINFO_EXTENSION)
            );

            $allowedExtensions = ["jpg", "jpeg", "png", "pdf"];

            if (!in_array($extension, $allowedExtensions, true)) {
                $message = "Invalid file extension.";
            } else {
                $newName = bin2hex(random_bytes(8)) . "." . $extension;

                if (move_uploaded_file(
                    $file["tmp_name"],
                    $uploadDir . $newName
                )) {
                    $message = "File uploaded successfully!";
                } else {
                    $message = "File upload failed.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" required>
        <p>Allowed: JPG, PNG, PDF (maximum 2 MB)</p>
        <button type="submit">Upload File</button>
    </form>

    <p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>

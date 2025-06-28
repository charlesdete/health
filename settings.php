<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "triza";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch current settings
$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);
$settings = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_name = htmlspecialchars($_POST['site_name']);
    $site_description = htmlspecialchars($_POST['site_description']);
    $contact_email = filter_var($_POST['contact_email'], FILTER_VALIDATE_EMAIL);

    // Handle logo upload
    $logo_path = $settings['logo_path'];
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $logo_name = time() . '_' . basename($_FILES['logo']['name']);
        $target = $upload_dir . $logo_name;

        $ext = strtolower(pathinfo($target, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            move_uploaded_file($_FILES['logo']['tmp_name'], $target);
            $logo_path = $target;
        } else {
            $_SESSION['message'] = "Invalid logo file type.";
        }
    }

    // Update database
    $stmt = $conn->prepare("UPDATE settings SET site_name=?, site_description=?, contact_email=?, logo_path=? WHERE id=?");
    $stmt->bind_param("ssssi", $site_name, $site_description, $contact_email, $logo_path, $settings['id']);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Settings updated successfully.";
        header("Location: settings.php");
        exit;
    } else {
        $_SESSION['message'] = "Failed to update settings.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="style2.css">
    <title>Blog Settings</title>
    <style>
        form { max-width: 600px; margin: auto; }
        label { display: block; margin: 10px 0 5px; }
        input, textarea { width: 100%; padding: 8px; }
        .message { text-align: center; color: green; }
        img { max-height: 80px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="card2">
    <h2 style="text-align:center;">Blog Settings</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <p class="message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Site Name:</label>
        <input type="text" name="site_name" value="<?= htmlspecialchars($settings['site_name']) ?>" required>

        <label>Site Description:</label>
        <textarea name="site_description" rows="4"><?= htmlspecialchars($settings['site_description']) ?></textarea>

        <label>Contact Email:</label>
        <input type="email" name="contact_email" value="<?= htmlspecialchars($settings['contact_email']) ?>" required>

        <label>Upload Logo:</label>
        <input type="file" name="logo" accept="image/*">
        <?php if (!empty($settings['logo_path'])): ?>
            <img src="<?= $settings['logo_path'] ?>" alt="Site Logo">
        <?php endif; ?>

        <br><br>
        <button type="submit">Save Settings</button>
    </form>
        </div>
</body>
</html>

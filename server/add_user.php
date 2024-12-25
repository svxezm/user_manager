<?php
require_once 'includes/db.php';
$db = connectDb();

// Get input values
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING) ?? '';
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) ?? '';
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING) ?? '';
$role = filter_var($_POST['role'], FILTER_SANITIZE_STRING) ?? '';

// Insert into database
if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
    $stmt->bindParam(':name', filter_var($name, FILTER_SANITIZE_STRING));
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':role', $role);
} else if (strlen(filter_var($name), FILTER_VALIDATE_STRING) < 3) {
    die("Name $name is too short. Must contain at least 3 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("$email is not a valid email format");
} else {
    die("Unsufficient data");
}

if ($stmt->execute()) {
    header('Location: pages/user_list.php');
    exit;
} else {
    die('Error adding user: ' . $db->lastErrorMessage());
}

// Redirect back to the main page
header('Location: index.php');
exit;
?>

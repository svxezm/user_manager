<?php
ob_start();
require_once 'includes/db.php';

// Get input values
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$name || !$email || !$password || !$role) {
    die("Invalid input!");
}

// Insert into database
try {
    $db = connectDb();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $filteredName = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
    $stmt->bindParam(':name', $filteredName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':role', $role);
    $stmt->execute();

    header("Location: pages/user_list.php");
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

ob_end_flush();
?>

<?php
require_once 'includes/db.php';
$db = connectDb();

// Get the user ID from the URL
$id = $_GET['id'] ?? 0;

// Delete the user
$stmt = $db->prepare('DELETE FROM users WHERE id = :id');
$stmt->bindParam(':id', $id);

if (!$stmt->execute()) {
    die('Error adding user: ' . implode(', ', $stmt->errorInfo()));
} else {
    echo 'User added successfully';
}

// Redirect back to the main page
header('Location: pages/user_list.php');
exit;
?>

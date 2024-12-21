<?php
require_once 'includes/db.php';
$db = connectDb();

$query = $db->prepare('SELECT name, password FROM users WHERE name = :name');
$query->bindValue(':name', $_POST['username'] ?? '');
$result = $query->execute();

$userData = $result->fetchArray(SQLITE3_ASSOC);
$storedName = $userData['name'] ?? '';
$storedPassword = $userData['password'] ?? '';

$inputName = $_POST['username'] ?? '';
$inputPassword = $_POST['password'] ?? '';

if ($inputName === $storedName && password_verify($inputPassword, $storedPassword)) {
    header('Location: pages/user_list.php');
    exit;
} else {
    echo "Wrong name or password.";
}
?>

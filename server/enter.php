<?php
require_once 'includes/db.php';
$db = connectDb();

session_start();

$_SESSION['name'] = $_POST['login-name'];

$query = $db->prepare('SELECT name, password, role FROM users WHERE name = :name');
$query->bindValue(':name', $_POST['login-name'] ?? '');
$result = $query->execute();

$userData = $result->fetchArray(SQLITE3_ASSOC);
$storedName = $userData['name'] ?? '';
$storedPassword = $userData['password'] ?? '';

$_SESSION['role'] = $userData['role'] ?? '';

$inputName = $_POST['login-name'] ?? '';
$inputPassword = $_POST['login-password'] ?? '';

if ($inputName === $storedName && password_verify($inputPassword, $storedPassword)) {
    header('Location: pages/user_list.php');
    exit;
} else {
    echo "Wrong name or password.";
}
?>

<?php
require_once 'includes/config.php';

$conn = new PDO("sqlite:" . DB_FILE);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conn->prepare("SELECT COUNT(*) FROM users WHERE name = :name");
$query->execute([':name' => 'admin']);
$count = $query->fetchColumn();

if ($count == 0) {
    $password = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
    $stmt->execute([
        ':name' => 'admin',
        ':email' => 'admin@gmail.com',
        ':password' => $password,
        ':role' => 'admin'
    ]);
    echo "Admin user created.\nname = 'admin'\nemail = 'admin@gmail.com'\npassword = 'admin123'\n";
} else {
    echo "Admin user already exists.";
}
?>

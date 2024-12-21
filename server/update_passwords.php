<?php
require_once 'includes/db.php';
$db = connectDb();

$results = $db->query('SELECT id, password FROM users');
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    $userId = $row['id'];
    $plainPassword = $row['password'];

    // Skip if already hashed
    if (strlen($plainPassword) >= 60 && password_get_info($plainPassword)['algo'] !== 0) {
        continue;
    }

    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    $stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
}

echo "Passwords updated successfully!";
?>

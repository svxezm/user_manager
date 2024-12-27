<?php
require_once 'includes/config.php';

$databasePath = DB_FILE;

if (!file_exists($databasePath)) {
    // Create new database file
    $pdo = new PDO('sqlite:' . $databasePath);

    // Define new table schema
    $createUsersTable = "
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            role TEXT NOT NULL
        );
    ";

    // Execute schema creation
    $pdo->exec($createUsersTable);

    // Insert default data
    $stmt = $pdo->prepare("
        INSERT INTO users (name, email, password, role)
        VALUES ('admin', 'admin@gmail.com', :password, 'admin');
    ");
    $stmt->bindValue(':password', password_hash('admin123', PASSWORD_DEFAULT));
    $stmt->execute();

    echo 'Database and users table created successffully.';

    $pdo->exec($insertAdminInfo);
    echo 'Database seeded successffully.';
} else {
    $pdo = new PDO('sqlite:' . $databasePath);
    echo 'Database already exists.';
}
?>

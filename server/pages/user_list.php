<?php
require_once '../includes/db.php';
require_once '../includes/config.php';
$db = connectDb();

session_start();

if (empty($_SESSION['name'])) {
    header('Location: ../index.php');
    exit;
}

setcookie('user', $_SESSION['name'], time() + (86400 * 30), '/');
setcookie('today', date('l jS \of F Y h:i:s A'), time() + (86400 * 30), '/');

// Fetch all users
$results = $db->query('SELECT * FROM users');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager</title>
    <link rel="stylesheet" href="<?php echo STYLES_URL ?>/user_list.css">
    <script src="https://kit.fontawesome.com/6c1c375b44.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <section class="user-manager">
            <h1 class="user-manager__title">User Manager</h1>
            <div class="user-manager__content">
                <form action="../add_user.php" method="POST">
                    <div class="input-area">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" minlength="3" placeholder="Name" required>
                    </div>
                    <div class="input-area">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-area">
                        <label for="password">Password</label>
                        <input id="password" type="text" name="password" minlength="5" placeholder="Password" required>
                    </div>
                    <button type="submit">Add User</button>
                </form>
                <div class="users">
                    <h2 class="users__title">User List</h2>
                    <div class="users__content">
                        <div class="users__headers">
                            <ul>
                                <li class="users__headers__id">id</li>
                                <li class="users__headers__name">name</li>
                                <li class="users__headers__email">email</li>
                                <li class="users__headers__password">password</li>
                                <li class="users__headers__delete"></li>
                            </ul>
                        </div>
                        <div class="users__data">
                            <?php while ($row = $results->fetchArray(SQLITE3_ASSOC)): ?>
                                <ul>
                                    <li class="users__data__id">
                                        <?php echo htmlspecialchars($row['id']); ?>
                                    </li>
                                    <li class="users__data__name">
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </li>
                                    <li class="users__data__email">
                                        <?php echo htmlspecialchars($row['email']); ?>
                                    </li>
                                    <li class="users__data__password">
                                        <?php echo htmlspecialchars($row['password']); ?>
                                    </li>
                                    <li class="users__data__actions">
                                        <a class="users__data__actions__delete" href="../delete_user.php?id=<?php echo $row['id']; ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a class="logout" href="../index.php">Log out</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?php echo SCRIPTS_URL ?>/user_list.min.js"></script>
</body>
</html>

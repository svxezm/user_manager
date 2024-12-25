<?php
session_start();
require_once 'includes/config.php';

$_SESSION['name'] = 'Liz';
$_SESSION['browser'] = 'Firefox';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo STYLES_URL; ?>/index.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="enter.php" method="POST">
            <div class="input-area">
                <label for="name">Nome</label>
                <input id="name" type="text" name="username" required>
            </div>
            <div class="input-area">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

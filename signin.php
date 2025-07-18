<?php 
require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP &amp; MySQL Blog Application with Admin Panel</title>
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="<?= ROOT__URL ?>css/style.css">
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONTS (MONTSERRAT) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <section class="form__section">
        <section class="container form__section-container">
            <h2>Zaloguj się</h2>

            <?php if(isset($_SESSION['signup-success'])): ?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['signup-success']; unset($_SESSION['signup-success']); ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['signin'])): ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['signin']; unset($_SESSION['signin']); ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="<?= ROOT__URL ?>signin-logic.php" method="post">
                <input type="text" value="<?= $username_email ?>" name="username_email" placeholder="Nazwa użytkownika lub email">
                <input type="password" value="<?= $password ?>" name="password" placeholder="Hasło">

                <button type="submit" name="submit" class="btn">Zaloguj się</button>
                <small>Nie masz konta? <a href="signup.php">Zarejestruj się</a></small>
            </form>
        </section>
    </section>
</body>
</html>
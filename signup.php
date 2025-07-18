<?php
require 'config/constants.php';

// get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
// delete signup data session
unset($_SESSION['signup-data']);
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
            <h2>Zarejestruj się</h2>

            <?php if (isset($_SESSION['signup'])): ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>

            <form action="<?= ROOT__URL ?>signup-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Imię">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Nazwisko">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Nazwa użytkownika">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Hasło">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Potwierdź hasło">

                <div class="form__control">
                    <label for="avatar">Dodaj zdjęcie profilowe</label>
                    <input type="file" name="avatar" id="avatar">
                </div>

                <button type="submit" name="submit" class="btn">Zarejestruj się</button>
                <small>Masz już konto? <a href="signin.php">Zaloguj się</a></small>
            </form>
        </section>
    </section>
</body>

</html>
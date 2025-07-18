<?php
include 'partials/header.php';

// get back form data if there was an error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;

// delete session data
unset($_SESSION['add-user-data']);
?>

<section class="form__section">
    <section class="container form__section-container">
        <h2>Dodaj użytkownika</h2>

        <?php if (isset($_SESSION['add-user'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']); ?>
                </p>
            </div>
        <?php endif ?>

        <form action="<?= ROOT__URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Imię">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Nazwisko">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Nazwa użytkownika">
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Hasło">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Potwierdź hasło">

            <select name="userrole">
                <option value="0">Autor</option>
                <option value="1">Admin</option>
            </select>

            <div class="form__control">
                <label for="avatar"></label>
                <input type="file" name="avatar" id="avatar">
            </div>

            <button type="submit" name="submit" class="btn">Dodaj użytkownika</button>
        </form>
    </section>
</section>

<!-- ================================ END OF FORM ================================ -->

<?php
include '../partials/footer.php';
?>
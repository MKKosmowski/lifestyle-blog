<?php
require 'config/database.php';

// get signup from data if signup button was clicked
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // validate input values
    if(!$firstname) {
        $_SESSION['signup'] = "Wprowadź imię";
    } else if (!$lastname) {
        $_SESSION['signup'] = "Wprowadź nazwisko";
    } else if (!$username) {
        $_SESSION['signup'] = "Wprowadź nazwę użytkownika";
    } else if (!$email) {
        $_SESSION['signup'] = "Wprowadź poprawny email";
    } else if (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Hasło powinno mieć co najmniej 8 znaków";
    } else if (!$avatar['name']) {
        $_SESSION['signup'] = "Dodaj avatar";
    } else {
        // check if password don't match
        if($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Hasła nie są zgodne";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // check if username or email already exist in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Nazwa użytkownika lub email już istnieje";
            } else {
                // work on avatar
                // rename avatar (random)
                $time = time();
                $avatar_name = $time.$avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/'.$avatar_name;

                // make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if(in_array($extention, $allowed_files)) {
                    // make sure image is too large (1mb)
                    if($avatar['size'] < 1000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "Plik za duży (maks 1 MB)";
                    }
                } else {
                    $_SESSION['signup'] = "Plik musi być png, jpg lub jpeg";
                }
            }
        }
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['signup'])) {
        // pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: '.ROOT__URL.'signup.php');
        die();
    } else {
        // insert new user to users table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', 0)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)) {
            // redirect to login page with succes message
            $_SESSION['signup-success'] = "Rejestracja zakończona sukcesem. Zaloguj się";
            header('location: '.ROOT__URL.'signin.php');
            die();
        }
    }
} else {
    // if button wasn't clicked, bounce back to signup page
    header('location: '.ROOT__URL.'signup.php');
    die();
}
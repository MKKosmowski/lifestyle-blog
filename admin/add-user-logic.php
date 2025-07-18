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
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // validate input values
    if(!$firstname) {
        $_SESSION['add-user'] = "Wprowadź imię";
    } else if (!$lastname) {
        $_SESSION['add-user'] = "Wprowadź nazwisko";
    } else if (!$username) {
        $_SESSION['add-user'] = "Wprowadź nazwę użytkownika";
    } else if (!$email) {
        $_SESSION['add-user'] = "Wprowadź poprawny email";
    } else if (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Hasło powinno mieć co najmniej 8 znaków";
    } else if (!$avatar['name']) {
        $_SESSION['add-user'] = "Dodaj avatar";
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
                $_SESSION['add-user'] = "Nazwa użytkownika lub email już istnieje";
            } else {
                // work on avatar
                // rename avatar (random)
                $time = time();
                $avatar_name = $time.$avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/'.$avatar_name;

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
                        $_SESSION['add-user'] = "Plik za duży (maks 1 MB)";
                    }
                } else {
                    $_SESSION['add-user'] = "Plik musi być png, jpg lub jpeg";
                }
            }
        }
    }

    // redirect back to add-user page if there was any problem
    if(isset($_SESSION['add-user'])) {
        // pass form data back to signup page
        $_SESSION['add-user-data'] = $_POST;
        header('location: '.ROOT__URL.'admin/add-user.php');
        die();
    } else {
        // insert new user to users table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', $is_admin)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)) {
            // redirect to login page with succes message
            $_SESSION['add-user-success'] = "Nowy użytkownik $firstname $lastname został dodany";
            header('location: '.ROOT__URL.'admin/manage-users.php');
            die();
        }
    }
} else {
    // if button wasn't clicked, bounce back to add-user page
    header('location: '.ROOT__URL.'admin/add-user.php');
    die();
}
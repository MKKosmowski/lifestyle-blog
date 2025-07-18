<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    // get updatet form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    
    // check for valid input
    if(!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Nieprawidłowe imię i/lub nazwisko";
    } else {
        // update user
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "Nie udało się zaktualizować użytkownika";
        } else {
            $_SESSION['edit-user-success'] = "Użytkownik $firstname $lastname zaktualizowany pomyślnie";
        }
    }
}


header('location: '.ROOT__URL.'admin/edit-user.php');
die();
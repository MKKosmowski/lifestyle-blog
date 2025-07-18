<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    // get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title) {
        $_SESSION['add-category'] = "Wprowadź tytuł";
    } else if(!$description) {
        $_SESSION['add-category'] = "Wprowadź opis";
    }

    // redirect back to add category with form data if there was invalid input
    if(isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: '.ROOT__URL.'admin/add-category.php');
        die();
    } else {
        // insert category into database
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)) {
            $_SESSION['add-category'] = "Nie można dodać kategorii";
            header('location: '.ROOT__URL.'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-succes'] = "Kategoria $title dodana pomyślnie";
            header('location: '.ROOT__URL.'admin/manage-categories.php');
            die();
        }
    }
}
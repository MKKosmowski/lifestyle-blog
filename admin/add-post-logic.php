<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // validate form data
    if(!$title) {
        $_SESSION['add-post'] = "Sprawdź tytuł posta";
    } else if(!$category_id) {
        $_SESSION['add-post'] = "Wybierz kategorię posta";
    } else if(!$body) {
        $_SESSION['add-post'] = "Treść posta jest wymagana";
    } else if(!$thumbnail['name']) {
        $_SESSION['add-post'] = "Wybierz miniaturę posta";
    } else {
        // work on thumbnail
        // reneme the image
        $time = time(); // make each image namu unique
        $thumbnail_name = $time.$thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/'.$thumbnail_name;

        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if(in_array($extension, $allowed_files)) {
            // make sure image is not too big (2mb+)
            if($thumbnail['size'] < 2_000_000) {
                // upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = "Plik za duży (maks 2 MB)";
            }
        } else {
            $_SESSION['add-post'] = "Plik musi być png, jpg lub jpeg";
        }
    }

    // redirect back (whth form data) to add-post page if there is any problem
    if(isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location: '.ROOT__URL.'admin/add-post.php');
        die();
    } else {
        // set is_featured posts to 0 if is_featured for this post is 1
        if($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // insert post into database
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "Nowy post został dodany";
            header('location: '.ROOT__URL.'admin/');
            die();
        } else {
            $_SESSION['add-post'] = "Nie udało się dodać posta";
        }
    }
}
   
header('location: '.ROOT__URL.'admin/add-post.php');
die();
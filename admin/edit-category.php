<?php 
    include 'partials/header.php';

    if(isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        
        // fetch category from database
        $query = "SELECT * FROM categories WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
            $category = mysqli_fetch_assoc($result);
        }
    } else {
        header('location '.ROOT__URL.'admin/manage-categories.php');
        die();
    }
?>

<section class="form__section">
    <section class="container form__section-container">
        <h2>Edytuj kategorię</h2>

        <form action="<?= ROOT__URL ?>admin/edit-category-logic.php" method="post">
            <input type="hidden" name="id" value="<?= $category['id'] ?>" placeholder="Title">
            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Opis"><?= $category['description'] ?></textarea>

            <button type="submit" name="submit" class="btn">Zaktualizuj kategorię</button>
        </form>
    </section>
</section>

<!-- ================================ END OF FORM ================================ -->

<?php 
    include '../partials/footer.php';
?>
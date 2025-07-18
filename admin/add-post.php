<?php 
    include 'partials/header.php';

    // fetch categories form database
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    // get back form data if form was invalid
    $title = $_SESSION['add-post-data']['title'] ?? null;
    $body = $_SESSION['add-post-data']['body'] ?? null;

    // delete form data session
    unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <section class="container form__section-container">
        <h2>Dodaj post</h2>

        <?php if(isset($_SESSION['add-post'])): ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']); ?>
                </p>
            </div>
        <?php endif ?>

        <form action="<?= ROOT__URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" value="<?= $title ?>" name="title" placeholder="Tytuł">

            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>


            <textarea rows="10" name="body" placeholder="Treść"><?= $body ?></textarea>

            <?php if(isset($_SESSION['user_is_admin'])): ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured" >Wyróżniony</label>
                </div>
            <?php endif ?>

            <div class="form__control">
                <label for="thumbnail">Dodaj miniaturę</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>

            <button type="submit" name="submit" class="btn">Dodaj post</button>
        </form>
    </section>
</section>

<!-- ================================ END OF FORM ================================ -->

<?php 
    include '../partials/footer.php';
?>
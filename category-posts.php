<?php 
include 'partials/header.php';

// fetch posts if id is set
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $result = mysqli_query($connection, $query);
} else {
    header('location: '.ROOT__URL.'blog.php');
    die();
}
?>

<header class="category__title">
    <?php
        // fetch category from category_id of post
        $category_query = "SELECT * FROM categories WHERE id=$id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        echo '<h2>'.$category['title'].'</h2>';
    ?>
</header>

<!-- ================================ END OF CATEGORY TITLE ================================ -->

<?php if(mysqli_num_rows($result) > 0): ?>
    <section class="posts">
        <div class="container posts__container">
            <?php while($post = mysqli_fetch_assoc($result)): ?>
                <article class="post">
                    <div class="post__thumbnail">
                        <img src="./images/<?= $post['thumbnail'] ?>">
                    </div>
                    <div class="post__info">
                        <h3 class="post__title"><a href="<?= ROOT__URL ?>post.php?id=<?= $post['id'] ?>"><?= substr($post['title'], 0, 30) ?>...</a></h3>
                        <p class="post__body">
                            <?= substr($post['body'], 0, 150) ?>...
                        </p>
                        <div class="post__author">
                            <?php
                                // fetch author from users table using author_id
                                $author_id = $post['author_id'];
                                $author_query = "SELECT * FROM users WHERE id=$author_id";
                                $author_result = mysqli_query($connection, $author_query);
                                $author = mysqli_fetch_assoc($author_result);
                            ?>
                            <div class="post__author-avatar">
                                <img src="./images/<?= $author['avatar'] ?>">
                            </div>
                            <div class="post__author-info">
                                <h5>By: <?= $author['firstname']." ".$author['lastname'] ?></h5>
                                <small>
                                    <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile ?>
        </div>
    </section>
<?php else: ?>
    <div class="alert__message error lg">
        <p>No post found for that category</p>
    </div>
<?php endif ?>

<!-- ================================ END OF POSTS ================================ -->

<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
            $all_catgegories_query = "SELECT * FROM categories";
            $all_catgegories_result = mysqli_query($connection, $all_catgegories_query);
        ?>
        <?php while($category = mysqli_fetch_assoc($all_catgegories_result)): ?>
            <a href="<?= ROOT__URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>

<!-- ================================ END OF CATEGORY BUTTONS ================================ -->

<?php 
include 'partials/footer.php';
?>

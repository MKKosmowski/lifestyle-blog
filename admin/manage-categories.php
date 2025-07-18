<?php 
    include 'partials/header.php';

    // fetch categories from database
    $query = "SELECT * FROM categories ORDER BY title";
    $categories = mysqli_query($connection, $query);
?>

<section class="dashboard">
    <!-- add category succes message -->
    <?php if(isset($_SESSION['add-category-succes'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-category-succes']; unset($_SESSION['add-category-succes']); ?>
            </p>
        </div>

    <!-- edit category error message -->
    <?php elseif(isset($_SESSION['edit-category'])): ?>
            <div class="alert__message error container">
                <p>
                    <?= $_SESSION['edit-category']; unset($_SESSION['edit-category']); ?>
                </p>
            </div>

    <!-- edit category success message -->
    <?php elseif(isset($_SESSION['edit-category-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-category-success']; unset($_SESSION['edit-category-success']); ?>
            </p>
        </div>

    <!-- delete category success message -->
    <?php elseif(isset($_SESSION['delete-category-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-category-success']; unset($_SESSION['delete-category-success']); ?>
            </p>
        </div>
    <?php endif ?>

    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle">
            <i class="uil uil-angle-right-b"></i>
        </button>
        <button id="hide__sidebar-btn" class="sidebar__toggle">
            <i class="uil uil-angle-left-b"></i>
        </button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Dodaj post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="uil uil-postcard"></i>
                        <h5>Zarządzaj postami</h5>
                    </a>
                </li>

            <?php if(isset($_SESSION['user_is_admin'])): ?>
                <li>
                    <a href="add-user.php">
                        <i class="uil uil-user-plus"></i>
                        <h5>Dodaj użytkownika</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php">
                        <i class="uil uil-users-alt"></i>
                        <h5>Zarządzaj użytkownikami</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>Dodaj kategorię</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php" class="active">
                        <i class="uil uil-list-ul"></i>
                        <h5>Zarządzaj kategoriami</h5>
                    </a>
                </li>
            <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Zarządzaj kategoriami</h2>
            <?php if(mysqli_num_rows($categories) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Edytuj</th>
                        <th>Usuń</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <tr>
                            <td><?= $category['title'] ?></td>
                            <td><a href="<?= ROOT__URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edytuj</a></td>
                            <td><a href="<?= ROOT__URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Usuń</a></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="alert__message error"><?= "Brak kategorii" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>

<!-- ================================ END OF DASHBOARD ================================ -->

<?php 
    include '../partials/footer.php';
?>
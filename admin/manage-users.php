<?php 
    include 'partials/header.php';

    // fetch users from database but not curren user
    $curren_admin_id = $_SESSION['user-id'];
    $query = "SELECT * FROM users WHERE NOT id=$curren_admin_id";
    $users = mysqli_query($connection, $query);
?>

<section class="dashboard">
    <!-- add user success message -->
    <?php if(isset($_SESSION['add-user-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-user-success']; unset($_SESSION['add-user-success']); ?>
            </p>
        </div>

    <!-- edit user error message -->
    <?php elseif(isset($_SESSION['edit-user'])): ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-user']; unset($_SESSION['edit-user']); ?>
            </p>
        </div>

    <!-- edit user success message -->
    <?php elseif(isset($_SESSION['edit-user-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success']; unset($_SESSION['edit-user-success']); ?>
            </p>
        </div>
        
    <!-- delete user success message -->
    <?php elseif(isset($_SESSION['delete-user-success'])): ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-user-success']; unset($_SESSION['delete-user-success']); ?>
            </p>
        </div>

    <!-- delete user error message -->
    <?php elseif(isset($_SESSION['delete-user'])): ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user']; unset($_SESSION['delete-user']); ?>
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
                    <a href="manage-users.php" class="active">
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
                    <a href="manage-categories.php">
                        <i class="uil uil-list-ul"></i>
                        <h5>Zarządzaj kategoriami</h5>
                    </a>
                </li>
            <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Zarządzaj użytkownikami</h2>
            <?php if(mysqli_num_rows($users) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Imię i nazwisko</th>
                        <th>Nazwa użytkownika</th>
                        <th>Edytuj</th>
                        <th>Usuń</th>
                        <th>Administrator</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users)): ?>
                        <tr>
                            <td><?= "{$user['firstname']}"." "."{$user['lastname']}"  ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><a href="<?= ROOT__URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edytuj</a></td>
                            <td><a href="<?= ROOT__URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Usuń</a></td>
                            <td><?= $user['is_admin'] ? 'Tak' : 'Nie' ?></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="alert__message error"><?= "Brak użytkowników" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>

<!-- ================================ END OF DASHBOARD ================================ -->

<?php 
    include '../partials/footer.php';
?>
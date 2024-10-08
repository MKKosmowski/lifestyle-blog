<?php 
    include 'partials/header.php';

    if(isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
    } else {
        header('location: '.ROOT__URL.'admin/manage-users.php');
        die();
    }
?>

<section class="form__section">
    <section class="container form__section-container">
        <h2>Edit User</h2>

        <form action="<?= ROOT__URL ?>admin/edit-user-logic.php" method="post">
            <input type="hidden" value="<?= $user['id'] ?>" name="id">
            <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
            <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
 
            <div class="form__control">
                <p>User Role</p>
                <select name="userrole">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
            </div>


            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </section>
</section>

<!-- ================================ END OF FORM ================================ -->

<?php 
    include '../partials/footer.php';
?>
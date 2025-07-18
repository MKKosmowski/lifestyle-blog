<footer>
    <div class="footer__socials">
        <a href="https://youtube.com" target="_blank"><i class="uil uil-youtube"></i></a>
        <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Kategorie</h4>
            <ul>
                <?php
                $all_catgegories_query = "SELECT * FROM categories";
                $all_catgegories_result = mysqli_query($connection, $all_catgegories_query);
                ?>
                <?php while ($category = mysqli_fetch_assoc($all_catgegories_result)): ?>
                    <li><a href="<?= ROOT__URL ?>category-posts.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </article>
        <article>
            <h4>Wsparcie</h4>
            <ul>
                <li><a href="">Wsparcie&nbsp;online</a></li>
                <li><a href="">Numery&nbsp;telefonów</a></li>
                <li><a href="">E-maile</a></li>
                <li><a href="">Wsparcie&nbsp;społeczności</a></li>
                <li><a href="">Lokalizacja</a></li>
            </ul>
        </article>
        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">Bezpieczeństwo</a></li>
                <li><a href="">Naprawy</a></li>
                <li><a href="">Najnowsze</a></li>
                <li><a href="">Popularne</a></li>
                <li><a href="">Kategorie</a></li>
            </ul>
        </article>
        <article>
            <h4>Stałe&nbsp;linki</h4>
            <ul>
                <li><a href="<?= ROOT__URL ?>">Strona&nbsp;główna</a></li>
                <li><a href="<?= ROOT__URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT__URL ?>about.php">O&nbsp;nas</a></li>
                <li><a href="<?= ROOT__URL ?>services.php">Usługi</a></li>
                <li><a href="<?= ROOT__URL ?>contact.php">Kontakt</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>&copy; Blog — wszelkie prawa zastrzeżone</small>
    </div>
</footer>

<script src="<?= ROOT__URL  ?>js/main.js"></script>
</body>

</html>
<footer class="site-footer container">
    <div class="footer-content">
        <?php
        $args = array(
            "theme_location" => "main-menu",
            "container" => "nav",
            "container_class" => "footer-menu"
        );
        wp_nav_menu($args)
        ?>

        <p class="copyright"><?php echo get_bloginfo("name") ?>&copy;</p>
    </div>

</footer>

<?php wp_footer() //This connects the functions that are initiated in the footer from functions.js
?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Fitness</title>
    <?php wp_head() ?> <!-- Connects the wp_enqueue functions from functions.php  -->
</head>

<body>

    <header class="site-header">
        <div class="container header-grid">
            <div class="navigation-bar">
                <div class="logo">
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo image">
                    </a>
                </div>
                <!-- How to connect navigation menu to WP -->
                <?php
                $args = array(
                    "theme_location" => "main-menu",
                    "container" => "nav",
                    "container_class" => "main-menu"
                );
                wp_nav_menu($args) // this function creates the Connection to WP
                ?>
            </div>
        </div>
    </header>
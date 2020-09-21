<?php


//Link to the queries file
require get_template_directory() . "/inc/queries.php";

//Create the menus
function gymFitnessMenu()
{

    register_nav_menus(array(
        "main-menu" => "Main Menu",

    ));
};
add_action("init", "gymFitnessMenu");

//connect CSS and JS files (like linking in html)
function gymFitnessScripts()
{
    //Normalize Library
    wp_enqueue_style("normalize", get_template_directory_uri() . "/css/normalize.css", array(), "8.0.1");
    //Google Fonts
    wp_enqueue_style("googlefonts", "//fonts.googleapis.com/css2?family=Open+Sans:wght@400;700;800&display=swap", array(), "1.0.0");
    wp_enqueue_style("googlefonts2", "//fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap", array(), "1.0.0");
    wp_enqueue_style("googlefonts3", "//fonts.googleapis.com/css2?family=Staatliches&display=swap", array(), "1.0.0");

    //SlickNav CSS
    wp_enqueue_style("slicknavcss", get_template_directory_uri() . "/css/slicknav.min.css", array(), "1.0.10");

    //BX Slider CSS
    wp_enqueue_style("bxslidercss", "//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css", array(), "4.2.12");

    //Main Stylesheet
    wp_enqueue_style("style", get_stylesheet_uri(), array("normalize", "googlefonts"), "1.0.0");

    wp_enqueue_script("jquery");
    //SlickNav JS
    wp_enqueue_script("slicknavjs", get_template_directory_uri() . "/js/jquery.slicknav.min.js", array("jquery"), "1.0.10", true);

    if (basename(get_page_template()) === "gallery.php") {
        //Lightbox CSS
        wp_enqueue_style("lightboxcss", get_template_directory_uri() . "/css/lightbox.min.css", array(), "2.11.3");

        //Lightbox JS
        wp_enqueue_script("lightboxjs", get_template_directory_uri() . "/js/lightbox.min.js", array("jquery"), "2.11.3", true);
    }
    // BX Slider JS
    wp_enqueue_script("bxsliderjs", "//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js", array("jquery"), "4.2.12");


    //Load scripts
    wp_enqueue_script("scripts", get_template_directory_uri() . "/js/scripts.js", array("jquery"), "1.0.0", true);
}

add_action("wp_enqueue_scripts", "gymFitnessScripts");

//Add images

function gymFitnessSetup()
{
    //Register a new customized image size (Dont add too much because it generates a new file for each resize)
    add_image_size("square", 350, 350, true);
    add_image_size("portrait", 350, 724, true);
    add_image_size("box", 400, 375, true);
    add_image_size("mediumSize", 700, 400, true);
    add_image_size("blog", 966, 644, true);

    //Add featured images
    add_theme_support("post-thumbnails");

    // Add SEO enhancment
    add_theme_support("title-tag");
};
//When the theme is ready -> run the function.
add_action("after_setup_theme", "gymFitnessSetup");

//Create and connect Widgets

function gymFitnessWidgets()
{
    register_sidebar([
        "name" => "Sidebar",
        "id" => "sidebar",
        "before_widget" => "<div class='widget'>",
        "after_widget" => "</div>",
        "before_title" => "<h3 class='text-center title'>",
        "after_title" => "</h3>"
    ]);
}

//Hook it
add_action("widgets_init", "gymFitnessWidgets");


// Display image on hero background

function gymFitnessHero()
{
    $front_page_id = get_option("page_on_front");
    $image_id = get_field("hero", $front_page_id);
    $image_url = $image_id["url"];

    //Create a false stylesheet
    wp_register_style("custom", false);
    wp_enqueue_style("custom");

    $featured_image_css = "
        body.home .site-header{
        background-image: linear-gradient(rgba(0,0,0,0.65),rgba(0,0,0,0.65)), url($image_url);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        }
    ";
    wp_add_inline_style("custom", $featured_image_css);
};

add_action("init", "gymFitnessHero");

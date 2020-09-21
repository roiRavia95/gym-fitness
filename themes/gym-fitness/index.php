<?php get_header() ?>
<h1>index.php</h1>
<?php while (have_posts()) : the_post(); ?>
    <h1>
        <a href="<?php get_template_directory_uri() . the_title() ?>"><?php the_title() ?></a></h1>
    <br />
    <p><?php the_content() ?></p>


<?php
endwhile;

get_footer();

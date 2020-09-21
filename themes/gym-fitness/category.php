<?php get_header() ?>
<main class="container page section">
    <?php
    $category = get_queried_object();
    ?>
    <div class="text-center">
        <h2 class="primary-text category-title">Category: <?php echo $category->name ?>(<?php echo $category->count ?>)</h2>
        <p class="category-description"><?php echo category_description($category->ID) ?> </p>
    </div>
    <ul class="blog-entries">
        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part("template-parts/blog", "loop");
        endwhile;
        ?>
    </ul>
</main>

<?php get_footer();

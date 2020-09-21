<?php get_header('front'); ?>
<section class="welcome section text-center ">

    <h2 class="welcome-heading"><?php echo get_field('welcome_heading') ?></h2>
    <p><?php echo get_field('welcome_text') ?></p>
</section>
<section class="areas">
    <ul class="areas-container">
        <?php
        for ($i = 1; $i <= 4; $i++) { ?>
            <li class="area">
                <?php
                $area = get_field("area_$i");
                $image = wp_get_attachment_image_src($area["area_image"], "mediumSize");
                if ($area) {
                ?>

                    <img src="<?php echo $image[0] ?>" alt="Area">
                    <p class="text-center"><?php echo $area["area_title"] ?></p>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>

</section>
<section class="classes-homepage">
    <div class="container section">
        <h2 class="text-center"><a href="<?php the_permalink(get_page_by_title("classes")) ?>">Classes</a></h2>
        <?php gymfitness_classes_list(4) ?>
    </div>
</section>

<section class="instructors-homepage container section">
    <div class="text-center">
        <h2>Our Instructors</h2>
        <p>Professional instructors that will help you achieve the body you've always dreamed of!</p>
        <?php gymfitness_instructors_list() ?>
    </div>
</section>

<section class="testimonials-homepage">
    <h2 class="text-center">Testimonials</h2>
    <div class="container">
        <?php
        gymfitness_testimonials_list();
        ?>
    </div>
</section>

<section class="blogs-homepage section container">
    <h2 class="text-center"> Our Blogs</h2>
    <p class="text-center">Read our expert blog posts</p>

    <ul class="blog-entries">

        <?php
        $args = array(
            "post_type" => "post",
            "posts_per_page" => 4,
        );
        $blogs = new WP_query($args);
        while ($blogs->have_posts()) : $blogs->the_post();
        ?>
        <?php get_template_part("template-parts/blog", "loop");
        endwhile; ?>
    </ul>

</section>

<?php get_footer(); ?>
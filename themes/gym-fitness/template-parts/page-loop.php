<?php while (have_posts()) : the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title() ?></h1>


    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail("blog", array("class" => "featured-image"));
    };

    if (get_post_type() === "gym-fitness_classes") {
        $startTime = get_field("start-time");
        $endTime = get_field("end_time");
    ?>
        <p class="class-schedule"><?php echo the_field("class_days") . " - $startTime to $endTime" ?></p>
    <?php
    };

    ?>

    <p>
        <?php the_content() ?>
    </p>
<?php endwhile; ?>
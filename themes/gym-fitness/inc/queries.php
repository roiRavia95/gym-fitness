<?php

function gymfitness_classes_list($num_of_classes = -1)
{ ?>
    <ul class="classes-list">
        <?php $args = array(
            "post_type" => "gym-fitness_classes",
            "posts_per_page" => $num_of_classes
        );
        // Use WP query and append the results into $calsses
        $classes = new WP_query($args);
        while ($classes->have_posts()) : $classes->the_post();
        ?>
            <a href="<?php the_permalink() ?>">
                <li class="gym-class card gradient">
                    <?php the_post_thumbnail("mediumSize") ?>
                    <div class="card-content">
                        <h3 class="card-title"><?php the_title() ?></h3>

                        <?php
                        $startTime = get_field("start-time");
                        $endTime = get_field("end_time");
                        ?>
                        <p><?php echo the_field("class_days") . " - $startTime to $endTime"; ?></p>
                    </div>
                </li>
            </a>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </ul>
<?php
}

function gymfitness_instructors_list($num_of_instructors = -1)
{
?>
    <ul class="instructors-list">
        <?php $args = array(
            "post_type" => "instructors",
            "posts_per_page" => $num_of_instructors
        );

        $instructors = new WP_query($args);

        while ($instructors->have_posts()) : $instructors->the_post();
        ?>
            <li class="instructor ">
                <?php the_post_thumbnail("mediumSize"); ?>
                <div class="content text-center">

                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?></p>
                    <div class="specialties">

                        <?php
                        $specialties = get_field("specialties");
                        foreach ($specialties as $s) {
                        ?>
                            <span class="specialties-tags"> <?php echo  $s ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </ul>
    <?php

    function gymfitness_testimonials_list()
    {
    ?>
        <ul class="testimonials-list slider">
            <?php
            $args = array(
                "post_type" => "testimonials",
                "post_per_page" => 10
            );
            $testimonials = new WP_query($args);
            while ($testimonials->have_posts()) : $testimonials->the_post();
            ?>
                <li class="testimonial text-center">
                    <blockquote>
                        <?php the_content() ?>
                    </blockquote>
                    <footer class="testimonials-footer">
                        <?php the_post_thumbnail("thumbnail"); ?>
                        <p><?php the_title() ?></p>
                    </footer>
                </li>
            <?php
            endwhile;
            wp_reset_postdata(); ?>
        </ul>
<?php
    }
}

?>
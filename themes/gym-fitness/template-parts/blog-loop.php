<li class="card gradient">
    <?php the_post_thumbnail("mediumSize") ?>
    <?php the_category() ?>
    <div class="card-content">
        <a href="<?php the_permalink() ?>">
            <h3 class="card-title"><?php the_title() ?></h3>
        </a>
        <a href="<?php echo get_author_posts_url(get_the_author_meta("ID")) ?>">
            <p class="meta"> <span class="text-primary">By:</span> <?php echo get_the_author_meta("display_name") ?></p>
        </a>
        <p class="date-published">
            <span class="text-primary">Date:</span>
            <?php the_time(get_option("date_format")) ?>
        </p>
    </div>
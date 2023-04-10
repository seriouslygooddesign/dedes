<?php get_header();
while (have_posts()) : the_post(); ?>
    <div class="container spacer-section-py">
        <div class="row gx-md-4">
            <?php if (has_post_thumbnail()) : ?>
                <div class="col-md-6">
                    <?php the_post_thumbnail('medium_large'); ?>
                </div>
            <?php endif; ?>
            <div class="col">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php
endwhile;
get_footer();
?>
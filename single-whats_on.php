<?php get_header();
get_template_part('components/page-header');
while (have_posts()) : the_post(); ?>
    <div class="container-sm spacer-section-py">
        <?php the_content(); ?>
    </div>
<?php
endwhile;

$loop = get_posts([
    'post_type' => 'whats_on',
    'posts_per_page' => 3,
    'exclude' => get_the_ID()
]);
if ($loop) : ?>

    <div class="overflow-hidden">
        <div class="container spacer-section-py" data-animate>
            <div class="block-header">
                <h2>Other Posts</h2>
            </div>
            <?php
            foreach ($loop as $post) :
                setup_postdata($post); ?>
                <div class="col">
                    <?php get_template_part('components/post'); ?>
                </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif;

get_footer();
?>
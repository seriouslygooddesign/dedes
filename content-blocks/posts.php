<?php
$loop = get_posts([
    'posts_per_page' => 4
]);
if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);
    ?>
    <div class="container" data-animate>
        <div class="row align-items-center">
            <div class="col">
                <h2>Latest News</h2>
            </div>
            <div class="col-auto">
                <a href="<?= esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="button">View All</a>
            </div>
        </div>
        <div class="row gy-3 row-cols-md-3">
            <?php
            foreach ($loop as $post) :
                setup_postdata($post); ?>
                <div class="col-12">
                    <?php get_template_part('components/post'); ?>
                </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

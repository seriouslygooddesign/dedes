<?php
$loop = get_posts([
    'post_type' => 'whats_on',
    'posts_per_page' => -1
]);
if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);
    ?>
    <div class="container text-center" data-animate>
        <h2>What's On</h2>
        <div class="row g-3 justify-content-center row-cols-1 rows-cols-sm-2 row-cols-md-3">
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
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

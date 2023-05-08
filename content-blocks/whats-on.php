<?php
$post_type = 'whats_on';

$loop = get_posts([
    'post_type' => $post_type,
    'posts_per_page' => 4
]);

$loop = get_sub_field('type') == 'select' ? get_sub_field($post_type) : $loop;

if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);
    ?>
    <div class="overflow-hidden">
        <div class="container" data-animate>
            <div class="block-header text-center">
                <h2>What's On</h2>
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
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

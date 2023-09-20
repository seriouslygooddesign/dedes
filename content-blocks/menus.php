<?php
$post_type = 'menu';

$loop = get_posts([
    'post_type' => $post_type,
    'posts_per_page' => -1
]);

$loop = get_sub_field('type') == 'select' ? get_sub_field('menus') : $loop;

if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);
    get_template_part('components/block', 'header', ['class' => 'container']); ?>

    <div class="container">
        <div class="row justify-content-center g-3 row-cols-md-3">
            <?php
            foreach ($loop as $post) :
                setup_postdata($post); ?>
               <?php get_template_part('components/menu') ?>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php
    get_template_part('components/block', 'end');

endif;

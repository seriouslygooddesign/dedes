<?php
$post_type = 'room';

$loop = get_posts([
    'post_type' => $post_type,
    'posts_per_page' => -1
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
            <?php
            foreach ($loop as $post) :
                setup_postdata($post); ?>
                <div class="row">
                    <div class="col order-md-1">
                        <?= wp_get_attachment_image(get_post_thumbnail_id(),'medium_large') ?>
                    </div>
                    <div class="col-md">
                        <?php the_title('<h2>','</h2>') ?>
                        <?php the_content() ?>
                    </div>
                </div>
                <hr>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

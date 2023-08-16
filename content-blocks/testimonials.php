<?php
$args = wp_parse_args(
    $args,
    [
        'post_type' => get_sub_field('post_type'),
        'type' => get_sub_field('type'),
    ]
);
extract($args);

$loop = get_posts([
    'post_type' => 'testimonial',
    'posts_per_page' => -1,
]);

$loop = $type == 'select' ? get_sub_field('posts') : $loop;
if (!$loop) return;

$block_args = [
    'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
?>
<?php get_template_part('components/block', 'header', ['class' => 'container']);
?>

<div class="container text-center-md-max">
    <div class="row gy-0" data-swiper-id="<?= wp_unique_id() ?>">
        <div class="col-md-8 col-lg-9 order-md-1">
            <div class="swiper" data-swiper-posts>
                <div class="swiper-wrapper">
                    <?php
                    foreach ($loop as $post) :
                        setup_postdata($post);
                        $title = '<h3 class="h6">' . get_the_title() . '</h3>';
                        $subtitle = get_field('subtitle');
                        $subtitle = $subtitle ? "<p class='lh-sm'> $subtitle </p>" : '';
                        $img = wp_get_attachment_image(get_post_thumbnail_id(), 'thumbnail', null, ['class' => 'img-rounded'])
                    ?>
                        <div class='swiper-slide'>
                            <div class="row gy-md-2 gy-lg-4">
                                <div class="col order-md-1">
                                    <?= $img ?>
                                    <div class="vstack gap-1 mt-spacer-element-half">
                                        <?= $title . $subtitle ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="fs-xl">
                                        <?= get_the_content() ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="spacer-element">
                <?php get_template_part('components/slider-controls') ?>
            </div>
        </div>
    </div>
</div>
<?php
get_template_part('components/block', 'end'); ?>
<?php
$loop = get_posts([
    'posts_per_page' => 10
]);

$loop = get_sub_field('type') == 'latest' ? $loop : get_sub_field('posts');
if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
        'class'=>'overflow-hidden'
    ];
    get_template_part('components/block', 'start', $block_args); ?>

    <div class="container" data-animate>
        <div class='swiper overflow-visible swiper--center' data-swiper-slider data-slides-per-view='3'>
            <div class="row align-items-center">
                <div class="col">
                    <h2>Our Blog</h2>
                </div>

                <div class="col-auto">
                    <?php get_template_part('components/slider-controls') ?>
                </div>
            </div>
            <br>
            <div class='swiper-wrapper swiper-wrapper--autoheight-sm-none'>
                <?php
                foreach ($loop as $post) :
                    setup_postdata($post);
                    $card_args = [
                        'decor' => null,
                        'content' => null,
                        'extra_class' => 'card--alt',
                        'link' => [
                            'link_title' => get_the_date(),
                            'link_url' => get_permalink(),
                        ]
                    ];
                ?>
                    <div class='swiper-slide text-center w-sm-100'>
                        <?php get_template_part('components/card', null, $card_args); ?>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

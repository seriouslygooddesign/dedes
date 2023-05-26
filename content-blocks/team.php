<?php
$post_type = 'team';

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
            <div class="row justify-content-center g-4 row-cols-md-2">
                <?php
                foreach ($loop as $post) :
                    setup_postdata($post); ?>
                    <div class="col-12" data-animate>
                        <?php
                        $card_args = array(
                            'decor' => false,
                            'link' =>  false,
                            'content' => apply_filters('the_content', get_the_content()) . do_shortcode("[social-icons type='alt']"),
                        );
                        get_template_part('components/card', null, $card_args); ?>
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

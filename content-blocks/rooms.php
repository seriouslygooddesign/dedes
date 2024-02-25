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
    <div class="target-content" data-animate>
        <?php //Target Buttons 
        ?>
        <div class="target-content__buttons">
            <?php
            $button_title = esc_html(get_the_title($loop[0]));
            $select_box_item = '';
            foreach ($loop as $post) : setup_postdata($post);
                $title = esc_html(get_the_title());
                $title = ucwords(strtolower($title));
                $href = esc_attr(sanitize_title($title));
                $select_box_item .= "<li class='select-box__item'><a class='select-box__link' href='#$href'>$title</a></li>";
            endforeach;
            $select_box_args = [
                'item' => $select_box_item,
                'button_title' => $button_title,
            ];
            wp_reset_postdata();
            get_template_part('components/select-box', null, $select_box_args)
            ?>
        </div>

        <?php //Block Header 
        get_template_part('components/block', 'header', ['class' => 'container', 'extra_class' => 'm-0']); ?>

        <?php //Target Content 
        ?>
        <div class="container">
            <?php foreach ($loop as $post) :
                setup_postdata($post);
                $title = esc_html(get_the_title());
                $gallery = get_field('gallery');
                $capacity = get_field('capacity');
                $features = get_field('features'); ?>

                <div class='target-content__content p-0' id='<?= sanitize_title($title) ?>' data-animate="up">
                    <div class='card-alt'>
                        <div class="row gx-4 row-cols-md-2">
                            <div class="col-12 button-backgroundless card-alt__imgs" data-photoswipe>
                                <?php
                                $featured_image = get_post_thumbnail_id();
                                if ($gallery) {
                                    $images_string = implode(',', $gallery);
                                    $shortcode = sprintf('[gallery ids="%s,%s" columns="1"]', esc_attr($featured_image), esc_attr($images_string));
                                    echo do_shortcode($shortcode);
                                } else {
                                    echo wp_get_attachment_link($featured_image);
                                }
                                ?>
                            </div>
                            <div class="col-12 card-alt__content align-self-center">
                                <?php the_title('<h3 class="h4">', '</h3>') ?>

                                <?php if ($capacity || $features) : ?>
                                    <div class="row gy-1">
                                        <?php
                                        $extra_fields = [
                                            $capacity => 'person',
                                            $features => 'pin-outline'
                                        ];
                                        foreach ($extra_fields as $content => $icon) :
                                            if ($content) : ?>
                                                <div class="col-12 color-text-primary">
                                                    <?php get_template_part('components/extra-field', null, ['icon' => $icon, 'content' => $content]); ?>
                                                </div>
                                        <?php endif;
                                        endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php the_content() ?>

                                <?php
                                $link = get_field('link');
                                if ($link) : ?>
                                    <a class="button" href="<?php echo esc_url($link); ?>" target="_blank">Enquire Now</a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>

    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;

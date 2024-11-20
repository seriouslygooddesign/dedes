<?php

$site_url = get_site_url();
$is_main_site = is_main_site();
$current_blog_id = get_current_blog_id();
switch_to_blog(1);
$loop = get_posts([
    'post_type' => WHATS_ON_POST_TYPE_NAME,
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key'   => 'list_of_websites',
            'value' => $current_blog_id,
            'compare'   => 'LIKE',
        )
    )
]);
if ($loop) : ?>
    <?php
    $block_args = [
        'modifier' => basename(__FILE__, '.php'),
    ];
    get_template_part('components/block', 'start', $block_args);

    if (!is_page(WHATS_ON_URL_PREFIX)) {
        get_template_part('components/block', 'header', ['class' => 'container', 'content' => "<h2>What's On</h2>", 'show' => true]);
    }
    ?>
    <div class="container" data-animate>
        <div class="row gy-5">
            <?php
            foreach ($loop as $post) :
                setup_postdata($post);
                $link = get_permalink();
                if (!$is_main_site) {
                    $link = $site_url . '/' . WHATS_ON_URL_PREFIX . '/' . $post->post_name;
                }
                $event_date = ($event_date = esc_html(get_field('event_date'))) ? "<span>" . get_core_icon('calendar', 'icon-inline fs-xs') . $event_date . "</span>" : null;
                $location = ($location = esc_html(get_field('location'))) ? "<span>" . get_core_icon('pin', 'icon-inline fs-xs') . $location . "</span>" : null;
                $content_top = $event_date || $location ? "<div class='fs-sm color-text-primary vstack gap-0'>$event_date$location</div>" : null;
                $content = "<p>" . get_the_excerpt() . "</p>";
                $card_args = [
                    'content' => "<div class='vstack gap-1'>$content_top$content</div>",
                    'image_holder' => true,
                    'link' => [
                        'link_title' => null,
                        'link_url' => get_permalink(),
                        'link_target' => '_self',
                    ]
                ];
                echo "<div class='col-md-6 col-lg-4'>";
                get_template_part('components/card', null, $card_args);
                echo "</div>";
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;
restore_current_blog();

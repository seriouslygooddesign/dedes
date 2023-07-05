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

    get_template_part('components/block', 'header', ['class' => 'container', 'content' => "<h2>What's On</h2>", 'show' => true]);
    ?>
    <div class="overflow-hidden">
        <div class="container" data-animate>
            <?php
            foreach ($loop as $post) :
                setup_postdata($post);
                $link = get_permalink();
                if (!$is_main_site) {
                    $link = $site_url . '/' . WHATS_ON_URL_PREFIX . '/' . $post->post_name;
                }
                get_template_part('components/post', null, ['link' => $link]);
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
    get_template_part('components/block', 'end'); ?>
<?php endif;
restore_current_blog();

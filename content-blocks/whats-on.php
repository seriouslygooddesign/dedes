<?php
$site_url = get_site_url();
$is_main_site = is_main_site();
$current_blog_id = get_current_blog_id();
switch_to_blog(1);

$loop = '';

if (!$is_main_site) {
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
} else {
    $sites_with_posts = [];
    $site_details = [];
    $posts = get_posts(array(
        'post_type' => WHATS_ON_POST_TYPE_NAME,
        'posts_per_page' => -1,
    ));

    foreach ($posts as $post) {
        $list_of_websites = get_field('list_of_websites');
        if ($list_of_websites && is_array($list_of_websites)) {
            $sites_with_posts = array_merge($sites_with_posts, $list_of_websites);
        }
    }

    $sites_with_posts = array_unique($sites_with_posts);

    foreach ($sites_with_posts as $site_id) {
        switch_to_blog($site_id);

        $whats_on_page = get_page_by_path(WHATS_ON_URL_PREFIX);

        if ($whats_on_page) {
            $featured_image_id = get_post_thumbnail_id($whats_on_page->ID);
            $featured_image_url = wp_get_attachment_image($featured_image_id, 'medium_large', false, ['class' => 'stretch', 'loading' => 'lazy']);

            $site_details[] = array(
                'name' => get_blog_details($site_id)->blogname,
                'url' => get_blog_details($site_id)->siteurl . "/" . WHATS_ON_URL_PREFIX,
                'featured_image' => $featured_image_url,
            );
        }

        restore_current_blog();
    }

    $loop = $site_details;
}

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
                $title = get_the_title();
                $image = get_post_thumbnail_id();
                $content = '';

                if ($is_main_site) {
                    $title = $post['name'];
                    $link = $post['url'];
                    $image = $post['featured_image'];
                    $link = [
                        'link_title' => 'View More',
                        'link_url' => $link,
                        'link_target' => '_blank',
                    ];
                } else {
                    $event_date = ($event_date = esc_html(get_field('event_date'))) ? "<span>" . get_core_icon('calendar', 'icon-inline fs-xs') . $event_date . "</span>" : null;
                    $location = ($location = esc_html(get_field('location'))) ? "<span>" . get_core_icon('pin', 'icon-inline fs-xs') . $location . "</span>" : null;
                    $content_top = $event_date || $location ? "<div class='fs-sm color-text-primary vstack gap-0'>$event_date$location</div>" : null;
                    $content_excerpt = "<p>" . get_the_excerpt() . "</p>";
                    $content = "<div class='vstack gap-1'>$content_top$content_excerpt</div>";
                    $link = [
                        'link_title' => null,
                        'link_url' => $link,
                        'link_target' => '_self',
                    ];
                }

                $card_args = [
                    'image' => $image,
                    'title' => $title,
                    'content' => $content,
                    'image_holder' => true,
                    'link' => $link
                ];
                echo "<div class='col-md-6 col-lg-4'>";
                get_template_part('components/card', null, $card_args);
                echo "</div>";
            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <?php get_template_part('components/block', 'end'); ?>

<?php elseif (is_page(WHATS_ON_URL_PREFIX)) : ?>
    <div class="container spacer-section-py">
        <h2 class="h4 text-center">No Events at the Moment – Stay Tuned for Updates!</h2>
    </div>
<?php
endif;
restore_current_blog();

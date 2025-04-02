<?php
get_header();
$title = is_archive() ? get_the_archive_title() : get_the_title(get_option('page_for_posts', true));
$post_type = get_post_type();
$img_options = get_field("banner_$post_type", 'options');
$page_header_args = [
    'title' => $title,
    'img_id' => $post_type == 'post' || !$img_options ? get_post_thumbnail_id(get_option('page_for_posts', true)) : $img_options,
];
get_template_part('components/page-header', null, $page_header_args);
?>
<div class="container spacer-section-py">
    <?php if (have_posts()) : ?>
        <div class="row gx-3 gy-4 row-cols-sm-2 row-cols-lg-3">
            <?php while (have_posts()) : the_post();
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
                <div class="col-12" data-animate>
                    <?php get_template_part('components/card', null, $card_args); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php get_template_part('components/pagination'); ?>
    <?php else : ?>
        <h2>Nothing Found</h2>
    <?php endif; ?>
</div>
<?php
get_footer();

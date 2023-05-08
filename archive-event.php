<?php
get_header();
$page_header_args = [
    'title' => get_the_archive_title(),
];
get_template_part('components/page-header', null, $page_header_args);
?>
<div class="overflow-hidden">
    <div class="container spacer-section-py">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('components/post'); ?>
            <?php endwhile; ?>
            <?php get_template_part('components/pagination'); ?>
        <?php else : ?>
            <h2>Nothing Found</h2>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();

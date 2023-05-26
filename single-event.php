<?php get_header();
get_template_part('components/page-header');
while (have_posts()) : the_post(); ?>
    <div class="container-sm spacer-section-py">
        <?php the_content(); ?>
    </div>
<?php
endwhile;
$event_args = [
    'loop' => get_posts([
        'post_type' => get_post_type(),
        'posts_per_page' => 3,
        'exclude' => get_the_ID()
    ])
]; ?>
<div class="spacer-section-pb">
    <?php get_template_part('components/events', null, $event_args); ?>
</div>
<div class="spacer-section-pb"></div>

<?php
get_footer();
?>
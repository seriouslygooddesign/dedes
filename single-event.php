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
        'post_type' => 'event',
        'posts_per_page' => 3,
        'exclude' => get_the_ID()
    ])
]; ?>
<div class="spacer-section-pb">
    <?php get_template_part('components/events', null, $event_args); ?>
</div>

<?php
get_footer();
?>
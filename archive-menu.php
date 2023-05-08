<?php
get_header();
$page_header_args = [
    'title' => get_the_archive_title(),
];
get_template_part('components/page-header', null, $page_header_args);
?>
<div class="container spacer-section-py">
    <?php if (have_posts()) : ?>
        <div class="row justify-content-center g-3 row-cols-md-3">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-12" data-animate>
                    <?php
                    $card_args = array(                        
                        'link' =>  [
                            'link_title' => 'Show Menu',
                            'link_url' => get_permalink(),
                        ] 
                    );
                    get_template_part('components/card', null, $card_args); ?>
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

<?php
switch_to_blog(1);
if (have_rows('sites', 'option')) : ?>
    <div class="spacer-section-py-half fs-sm">
        <div class="row g-3 row-cols-sm-2 row-cols-lg-4 justify-content-center">
            <?php while (have_rows('sites', 'option')) : the_row(); ?>
                <div class="col-12" data-animate>
                    <?php
                    $link = get_sub_field('link');
                    $cta_link = get_sub_field('cta_link');
                    $args = array(
                        'image' => get_sub_field('image'),
                        'gallery' => get_sub_field('gallery'),
                        'title' => get_sub_field('title'),
                        'content' => get_sub_field('content'),
                        'link' => $link ? [
                            'link_title' => 'Visit website',
                            'link_url' => $link,
                            'link_target' => '_blank',
                        ] : null,
                        'cta_link' => $cta_link ? [
                            'link_title' => $cta_link['title'],
                            'link_url' => $cta_link['url'],
                            'link_target' => $cta_link['target'] ? $cta_link['target'] : '_blank',
                        ] : null,
                    );
                    get_template_part('components/card', null, $args) ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
restore_current_blog();

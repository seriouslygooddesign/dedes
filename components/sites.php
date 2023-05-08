<?php
$sites = get_sites(array(
    'public' => 1,
    'site__not_in' => get_current_blog_id(),
));
?>

<div class="spacer-section-py fs-sm">
    <div class="row g-3 row-cols-sm-2 row-cols-lg-4 justify-content-center">
        <?php
        foreach ($sites as $site) :
            $site_id = $site->blog_id;
            $site_url = get_home_url($site_id);
            $site_name = get_blog_details($site_id)->blogname;
            switch_to_blog($site_id);
            $hide_site = get_field('hide_site', 'options');
            $site_description = get_field('site_description', 'options');
            $site_image = wp_get_attachment_image(get_field('site_featured_image', 'options'), 'large', false, ['class' => 'stretch']);
            restore_current_blog();

            if (!$hide_site) :
                $card_args = array(
                    'image' => $site_image,
                    'title' => $site_name,
                    'decor' => false,
                    'content' => $site_description,
                    'link' => [
                        'link_title' => 'Visit website',
                        'link_url' => $site_url,
                        'link_target' => '_blank',
                    ]
                ); ?>

                <div class="col-12">
                    <?php get_template_part('components/card', null, $card_args) ?>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
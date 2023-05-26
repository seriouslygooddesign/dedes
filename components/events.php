<?php
extract(wp_parse_args($args, [
    'loop' => '',
]));
$archive_link = get_post_type_archive_link('event');
if ($loop) :
?>
    <div class="overflow-hidden">
        <div class="container" data-animate>
            <?php
            $args = [
                'show' => true,
                'content' => '<h2>OUR EVENTS</h2>',
                'link_url' => esc_url($archive_link),
                'link_title' => 'ALL EVENTS',
            ];
            get_template_part('components/block', 'header', $args) ?>
            <?php
            foreach ($loop as $post) :
                setup_postdata($post);

                get_template_part('components/post');

            endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>
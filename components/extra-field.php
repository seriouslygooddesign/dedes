<?php
$args = wp_parse_args($args, [
    'icon' => '',
    'content' => '',
]);

extract($args);
if ($content) :
?>

    <div class="row d-inline-flex gx-1 align-items-center">
        <?php if ($icon) : ?>
            <div class="col-auto d-flex">
                <?php get_template_part('components/site-icon', null, ['icon' => $icon]); ?>
            </div>
        <?php endif; ?>
        <div class="col">
            <span><?= esc_html($content); ?></span>
        </div>
    </div>

<?php endif ?>
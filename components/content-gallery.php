<?php
$condition = get_row_index() % 2 !== 0;
$row_reverse = $condition ? ' flex-md-row-reverse' : '';
$color_background = !$condition ? ' color-background-surface' : '';
$description = esc_html(get_sub_field('description'));
$title = ($title = esc_html(get_sub_field('title'))) ? "<h2>$title</h2>" : '';
$content = ($content = get_sub_field('content')) ? $content : $title . $description;
$gallery = get_sub_field('gallery');
$featured_image = get_sub_field('image');
$links = [
    'custom_link' => get_sub_field('custom_link'),
    'link' => get_sub_field('link'),
];
$link_result = '';
foreach ($links as $key => $link) {
    if ($link) :
        $link_title = $link['title'] ?? 'Visit website';
        $link_url = $link['url'] ?? $link;
        $link_target = $link['target'] ?? '_blank';
        $link_class = $key == 'link' ? ' button--backgroundless' : '';
        $link_arrow = $key == 'link' ? ' <span class="site-icon site-icon--arrow">' : '';
        $link_result .= "<a href='$link_url' class='button$link_class' target='$link_target'>$link_title$link_arrow</span></a>";
    endif;
}
?>
<div class="row g-0<?= $row_reverse ?>">
    <div class="col-md-6 gallery-stretch pos-rel" data-animate>
        <div class='stretch color-background-muted'></div>
        <?php
        if ($gallery) {
            $images_string = implode(',', $gallery);
            $shortcode = sprintf('[gallery ids="%s,%s" columns="1" size="1536x1536"]', esc_attr($featured_image), esc_attr($images_string));
            echo do_shortcode($shortcode);
        } else {
            echo $featured_image ? wp_get_attachment_image($featured_image, 'medium_large', null, ['class' => 'img-stretch', 'loading' => 'lazy']) : '';
        }
        ?>
    </div>
    <div class="col-md-6 d-flex pos-rel align-items-center<?= $color_background ?>" data-animate>
        <div class="container-sm container--panel py-md-max-0 spacer-section-py">
            <?= $content ?? '' ?>
            <?= $link_result ? "<div class='button-group'>$link_result</div>" : '' ?>
        </div>
    </div>
</div>
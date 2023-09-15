<div class="col-12" data-animate>
    <?php
    $type = get_field('type');
    $link = get_field('link');
    $link_url = get_permalink();
    $link_title = 'Show Menu';
    $link_target = '_self';
    if ($type == 'link' && $link) {
        $link_url = $link['url'];
        $link_title = $link['title'] ?: $link_title;
        $link_target = $link['target'] ?: $link_target;
    }
    $card_args = array(
        'link' =>  [
            'link_url' => $link_url,
            'link_title' => $link_title,
            'link_target' => $link_target,
        ]
    );
    get_template_part('components/card', null, $card_args); ?>
</div>
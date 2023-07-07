<?php get_header();
get_template_part('components/page-header');

if (have_rows('categories')) : ?>
    <div class="spacer-section-pb target-content" data-animate style="--spacer-element: 1em;">
        <?php
        $button_title = esc_html(get_field('categories')[0]['title']);
        $select_box_item = '';
        $full_content = '';
        $content = '';

        while (have_rows('categories')) : the_row();
            $title = esc_html(get_sub_field('title'));
            $title = ucwords(strtolower($title));
            $sanitize_title = esc_attr(sanitize_title($title));
            
            $select_box_item .= "<li class='select-box__item'><a class='select-box__link' href='#$sanitize_title'>$title</a></li>";
            $select_box_args = [
                'item' => $select_box_item,
                'button_title' => $button_title,
            ];

            if (have_rows('content')) :
                while (have_rows('content')) : the_row();
                    $text = wp_kses_post(get_sub_field('text'));
                    $price = esc_html(get_sub_field('price'));
                    $col = $price ? 'col-9' : 'col-12';
                    if ($text) {
                        $text = "<div class='$col'>$text</div>";
                        $price = $price ? "<div class='col-3'><span class='spacer-element d-block text-right'>$price</span></div>" : "";
                        $content .= $text . $price;
                    }
                endwhile;
            endif;

            $full_content .= "<div class='target-content__content' id='$sanitize_title'><h3 class='m-0'>$title</h3><div class='row'>";
            $full_content .= $content;
            $full_content .= "</div></div>";
        endwhile; ?>

        <div class="target-content__buttons">
            <?php get_template_part('components/select-box', null, $select_box_args) ?>
        </div>

        <div class="container-sm">
            <?= $full_content ?>
        </div>
    </div>
<?php endif; ?>

<?php
get_footer();
?>
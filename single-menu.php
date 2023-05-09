<?php get_header();
get_template_part('components/page-header');

if (have_rows('categories')) : ?>
    <div class="spacer-section-pb target-content" data-animate>
        <div class="target-content__buttons">
            <div class="button-menu">
                <?php while (have_rows('categories')) : the_row(); ?>
                    <?php $title = get_sub_field('title'); ?>
                    <a href="#<?= esc_attr(sanitize_title($title)) ?>" class="button<?= get_row_index() === 1 ? ' active' : ''; ?>"><?= esc_html($title); ?></a>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="container-sm">
            <?php while (have_rows('categories')) : the_row();
                $title = esc_html(get_sub_field('title'));
                echo "<div class='target-content__content' id='" . esc_attr(sanitize_title($title)) . "'><h3 class='m-0'>$title</h3>";
                if (have_rows('content')) : ?>
                    <div class="row">
                        <?php while (have_rows('content')) : the_row();
                            $text = wp_kses_post(get_sub_field('text'));
                            $price = esc_html(get_sub_field('price'));
                            $col = $price ? 'col-9' : 'col-12';
                            if ($text) {
                                echo "<div class='$col'>$text</div>";
                                echo $price ? "<div class='col-3'><span class='spacer-element d-block text-right'>$price</span></div>" : "";
                            }
                        endwhile; ?>
                    </div>
                <?php endif;
                echo  "</div>"; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

<?php
get_footer();
?>
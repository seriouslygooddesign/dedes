<?php
$block_args = [
    'modifier' => basename(__FILE__, '.php'),
];
get_template_part('components/block', 'start', $block_args);
$type = get_sub_field('type');
?>

<?php get_template_part('components/block', 'header', ['class' => 'container']); ?>
<div class="container" data-animate>
    <?php if ($type === 'products') : ?>
        <?php
        $products_type = get_sub_field('products_type');
        $products_type_select = $products_type === 'select';
        $products_type_latest = $products_type === 'latest';
        $products_type_total_sales = $products_type === 'total_sales';

        $orderby = 'date';

        if ($products_type_select) {
            $orderby = 'post__in';
        } elseif ($products_type_total_sales) {
            $orderby = 'meta_value_num';
        } else {
            $orderby = 'date';
        }

        $loop = new WP_Query(array(
            'post_type'      => 'product',
            'posts_per_page' => $products_type_select ? -1 : 12,
            'post__in' => $products_type_select ? get_sub_field('products') : null,
            'meta_key' => $products_type_total_sales ? 'total_sales' : null,
            'orderby' => $orderby,
        ));
        ?>

        <ul class="site-products">
            <?php
            while ($loop->have_posts()) : $loop->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_query();
            ?>
        </ul>

    <?php else : ?>

        <?php
        $categories = get_sub_field('categories');
        if ($categories) : ?>
            <ul class="site-products">
                <?php foreach ($categories as $term) : ?>
                    <li class="product-category">
                        <a class="text-center underline-reverse" href="<?php echo esc_url(get_term_link($term)); ?>">
                            <div class="overflow-hidden ratio-1-1 color-background-surface">
                                <?php
                                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                                echo wp_get_attachment_image($thumbnail_id, 'woocommerce_thumbnail', false, ['loading' => 'eager']);
                                ?>
                            </div>
                            <h3 class="woocommerce-loop-product__title"><?php echo esc_html($term->name); ?></h3>
                            <?php echo false ? "<p>" . esc_html($term->description) . "</p>" : null; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

    <?php get_template_part('components/block', 'footer', ['class' => 'container']);    ?>
</div>
<?php
get_template_part('components/block', 'end');

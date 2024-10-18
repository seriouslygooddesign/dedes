<?php
$theme_color = get_core_theme_color('header');

$cta_link_shortcode = do_shortcode('[cta-link]');
$custom_logo_id = get_custom_logo();
$has_logo = $custom_logo_id ? ' has-logo' : '';
$extra_class = $has_logo;
$menu_wrap_class = !$cta_link_shortcode && !$custom_logo_id ?   'col d-flex justify-content-center' : 'col-auto';
if ($custom_logo_id || $cta_link_shortcode || has_nav_menu('menu-1')) :
?>

    <header class="site-header underline-reverse<?= $extra_class . $theme_color; ?>">
        <?php
        if (has_nav_menu('menu-1')) : ?>
            <div class="hide-header-element<?= $custom_logo_id ? ' order-1' : null; ?>">
                <?php get_template_part('components/toggle-menu') ?>
            </div>
        <?php endif ?>
        <div class="container-fluid">
            <div class="row gx-2 gx-md-3 align-items-center site-header-space">
                <?php
                if ($custom_logo_id) echo "<div class='col d-flex'>$custom_logo_id</div>"; ?>
                <?php
                if (has_nav_menu('menu-1')) : ?>
                    <div class="<?= $menu_wrap_class ?>">
                        <div class="overlay-menu<?= $custom_logo_id ? ' overlay-menu--right' : ' overlay-menu--left'; ?>">
                            <div class="overlay-menu__header hide-header-element">
                                <?php get_template_part('components/toggle-menu', null, ['label' => 'close', 'area' => 'Close Menu']) ?>
                            </div>

                            <div class="overlay-menu__wrap">
                                <?php get_template_part('components/site-menu', null, ['class' => 'site-menu site-menu--responsive']); ?>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if (function_exists('core_woocommerce_header') && false) {
                    echo !$custom_logo_id ? '<div class="col"></div>' : null;
                    echo '<div class="col-auto">';
                    core_woocommerce_header();
                    echo '</div>';
                } ?>

            </div>
        </div>

        <?php if ($cta_link_shortcode) : ?>
            <div class="cta-link">
                <?= $cta_link_shortcode; ?>
            </div>
        <?php endif; ?>

        <div class="curtain curtain--menu curtain--hidden stretch pos-fixed hide-header-element"></div>
    </header>
<?php endif; ?>
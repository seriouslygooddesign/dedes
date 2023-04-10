<header class="site-header underline-reverse">
    <div class="container-fluid">
        <div class="row gx-2 gx-md-3 align-items-center site-header-space">
            <?php
            $cta_link_shortcode = do_shortcode('[cta-link]');
            $custom_logo_id = get_custom_logo();
            if ($custom_logo_id) echo "<div class='col d-flex'>$custom_logo_id</div>"; ?>

            <?php
            if (has_nav_menu('menu-1')) : ?>
                <div class="col-auto">
                    <div class="overlay-menu">
                        <div class="overlay-menu__header hide-header-element">
                            <button role="button" class="overlay-menu-toggle" aria-label="Close Menu" data-overlay-menu-toggle>
                                <span class="overlay-menu-toggle__label">Close</span>
                                <?php get_template_part('components/site-icon', null, ['icon' => 'close', 'class' => 'overlay-menu-toggle__icon']); ?>
                            </button>
                        </div>
                        <?php
                        wp_nav_menu(
                            array(
                                'container' => false,
                                'theme_location' => 'menu-1',
                                'menu_class' => 'site-menu site-menu--responsive',
                                'walker' => new Sub_Menu_Toggle
                            )
                        );
                        ?>
                        <?php if ($cta_link_shortcode) : ?>
                            <div class="spacer-element hide-header-element">
                                <?= $cta_link_shortcode; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (function_exists('core_woocommerce_header')) {
                echo '<div class="col-auto">';
                core_woocommerce_header();
                echo '</div>';
            }
            ?>
            <?php
            if (!$custom_logo_id) echo "<div class='col'></div>"; ?>
            
            <?php if ($cta_link_shortcode) : ?>
                <div class="col-auto">
                    <?= $cta_link_shortcode; ?>
                </div>
            <?php endif; ?>

            <div class="col-auto hide-header-element">
                <button role="button" class="overlay-menu-toggle" aria-label="Show Menu" data-overlay-menu-toggle>
                    <span class="overlay-menu-toggle__label">Menu</span>
                    <?php get_template_part('components/site-icon', null, ['icon' => 'menu', 'class' => 'overlay-menu-toggle__icon']); ?>
                </button>
            </div>
        </div>
    </div>
    <div class="curtain curtain--menu curtain--hidden stretch pos-fixed hide-header-element"></div>
</header>
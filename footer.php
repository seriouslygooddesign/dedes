</main>
<footer class="site-footer<?= get_core_theme_color('footer') ?>">
	<div class="container underline-reverse spacer-section-pt spacer-section-pb-half">
		<div class="site-footer__widgets">
			<?php
			$footer_widget_counter = 1;
			while ($footer_widget_counter <= FOOTER_SIDEBAR_QUANTITY) {
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-$footer_widget_counter"));
				$footer_widget_counter++;
			}
			?>
		</div>
	</div>

	<div class="color-background-surface spacer-section-pt spacer-section-pb-half">
		<div class="container">
			<h2 class="h5 text-center m-0" style="text-transform: initial;">Discover Dedes Venues</h2>
			<?= do_shortcode('[dedes-sites]'); ?>
		</div>
	</div>

	<div class="container spacer-element text-center color-text-muted fs-sm">
		<?= esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved | website by <a href="https://sgd.com.au/" target="_blank" rel="noopener noreferrer">SGD</a>
	</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
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
	<?php

	$dedes_sites = do_shortcode('[dedes-sites]');
	if ($dedes_sites) {
		$accordion_args = [
			'total' => 1,
			'label_class' => false,
			'content_class' => 'container',
			'title' => 'Discover Dedes Websites',
			'text' => $dedes_sites,
			'faq_scheme' => false
		];
		get_template_part('components/accordion', null, $accordion_args);
	}

	?>

	<div class="container spacer-element text-center color-text-muted fs-sm">
		<?= esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved | website by <a href="https://sgd.com.au/" target="_blank" rel="noopener noreferrer">SGD</a>
	</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>

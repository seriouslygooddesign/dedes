</main>
<footer class="site-footer<?= get_core_theme_color() ?>">
	<div class="container underline-reverse spacer-section-py">
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
	if (is_multisite()) {
		$sites = get_sites(array(
			'public' => 1,
			'site__not_in' => get_current_blog_id(),
		));

		$visible_sites_count = array_reduce($sites, function ($count, $site) {
			$site_id = $site->blog_id;
			switch_to_blog($site_id);
			$hide_site = get_field('hide_site', 'options');
			restore_current_blog();

			return $count + !$hide_site;
		}, 0);

		$accordion_args = [
			'total' => $visible_sites_count,
			'label_class' => false,
			'content_class' => 'container',
			'title' => 'Discover Dedes Websites',
			'text' => do_shortcode('[dedes-sites]'),
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
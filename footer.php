</main>
<footer class="site-footer color-background-surface spacer-section-py">
	<div class="container underline-reverse">
		<div class="row">
			<?php
			$footer_widget_counter = 1;
			while ($footer_widget_counter <= FOOTER_SIDEBAR_QUANTITY) {
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-sidebar-$footer_widget_counter"));
				$footer_widget_counter++;
			}
			?>
		</div>
		<div class="row spacer-section-pt">
			<div class="col">&copy;<?php bloginfo('name'); ?> <?= esc_html(date('Y')); ?></div>
			<div class="col-auto">Website by <a href="https://sgd.com.au/" target="_blank" rel="noopener noreferrer">SGD</a></div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
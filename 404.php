<?php
get_header();
?>
<div class="color-background-surface spacer-section-py">
	<div class="container">
		<p>404</p>
		<h1>That page can’t be found</h1>
		<a href="<?= esc_url(home_url()); ?>" class="button">Return home</a>
	</div>
</div>
<div class="container spacer-section-py">
	<p>It looks like nothing was found at this location. Maybe try a search?</p>
	<?php get_search_form(); ?>
</div>
<?php
get_footer();

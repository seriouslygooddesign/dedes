<?php
get_header();
?>
<div class="spacer-section-py">
	<div class="container text-center">
		<p>404</p>
		<h1>That page can’t be found</h1>
		<a href="<?= esc_url(home_url()); ?>" class="button">Return home</a>
	</div>
</div>
<?php
get_footer();

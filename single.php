<?php
get_header();
get_template_part('components/page-header');
while (have_posts()) :
	the_post(); ?>
	<div class="spacer-section-py">
		<div class="container-md" data-animate>
			<?php the_content(); ?>
			<?php
			$cats = get_core_categories();
			$tags = get_core_tags();
			if ($cats || $tags) {
				echo "<hr>$cats$tags";
			}
			?>
		</div>
	</div>

	<?php
	$next_post = get_adjacent_post(false, '', true);
	if (empty($next_post)) {
		$first_post = get_posts(array(
			'post_type' => get_post_type(),
			'numberposts' => 1
		));
		$next_post = $first_post[0];
	}
	if ($next_post) : ?>
		<div class="color-background-surface spacer-section-py" data-animate>
			<div class="container-md">
				<div class="row gx-2 gx-sm-3 align-items-center">
					<div class="col-2 col-sm-auto">
						<a href="<?= esc_url(get_permalink($next_post->ID)); ?>" tabindex="-1" aria-hidden="true">
							<?= get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
						</a>
					</div>
					<div class="col">
						<h2 class="h6 m-0">Next Post</h2>
						<h3 class="m-0"><a href="<?= esc_url(get_permalink($next_post->ID)); ?>"><?= esc_html($next_post->post_title); ?></a></h3>
						<small><?= esc_html(get_the_time('F j, Y', $next_post->ID)); ?></small>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php
endwhile;
?>

<?php
$related = get_posts(
	array(
		'numberposts'  => 4,
		'exclude' => get_the_ID(),
	)
);
if ($related) : ?>
	<div class="container spacer-section-py">
		<h2 class="text-center" data-animate>Other <a href="<?= esc_url(get_permalink(get_option('page_for_posts'))); ?>">News</a></h2>
		<div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-4">
			<?php
			foreach ($related as $post) :
				setup_postdata($post);
			?>
				<div class="col">
					<?php get_template_part('components/post'); ?>
				</div>
			<?php endforeach;
			wp_reset_postdata(); ?>
		</div>
	</div>
<?php endif; ?>

<?php
get_footer();

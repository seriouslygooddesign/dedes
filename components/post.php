<?php
extract(wp_parse_args($args, [
    'link' => get_permalink(),
]));

$image = get_the_post_thumbnail(get_the_ID(), 'small', ['class' => 'post-card__img']);
$event_date = get_field('event_date');
?>
<div data-animate>
    <a href="<?= $link; ?>" class="post-card">
        <div class="row align-items-center gx-3">
            <?php if ($image) : ?>
                <div class="col-md-3">
                    <?= $image; ?>
                </div>
            <?php endif; ?>
            <div class="col-md">
                <div class="post-card__content">
                    <?php if ($event_date) : ?>
                        <div class="color-text-primary">
                            <?php get_template_part('components/extra-field', null, ['icon' => 'calendar', 'content' => $event_date]); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="h5 post-card__title"><?php the_title(); ?></h3>
                    <?php the_excerpt() ?>
                </div>
            </div>
            <?php if (get_post_type() == 'post') : ?>
                <div class="col col-md-auto post-card__date">
                    <div class="row g-2 align-items-center" style="min-width: 150px">
                        <div class="col-auto">
                            <span class="h2"><?php echo get_the_date('d'); ?></span>
                        </div>
                        <div class="col">
                            <span class="d-md-block"><?php echo get_the_date('F'); ?></span>
                            <?php echo get_the_date('Y'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-auto offset-md-1">
                <span class="site-icon site-icon--arrow fs-xl"></span>
            </div>
        </div>
    </a>
</div>
<?php
$image = get_the_post_thumbnail(get_the_ID(), 'small', ['class' => 'post-card__img']);
?>
<a href="<?php the_permalink(); ?>" class="post-card" data-animate>
    <div class="row align-items-center gx-3 flex-1">
        <?php if ($image) : ?>
            <div class="col-md-3">
                <?= $image; ?>
            </div>
        <?php endif; ?>
        <div class="col-md">
            <div class="post-card__content">
                <h3 class="h5 post-card__title"><?php the_title(); ?></h3>
                <?php the_excerpt() ?>
            </div>
        </div>
        <?php if (in_array(get_post_type(), ['post', 'event'])) : ?>
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
            <?php get_template_part('components/site-icon', null, ['icon' => 'arrow', 'class' => 'site-icon--arrow fs-xl']); ?>
        </div>
    </div>
</a>
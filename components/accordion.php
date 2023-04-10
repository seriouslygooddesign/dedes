<?php
extract(wp_parse_args($args, [
    'title' => get_sub_field('title'),
    'text' => get_sub_field('text'),
    'total' => 0,
    'current' => 1, // Start from 1
    'id' => wp_unique_id()
]));
if ($total > 0) : ?>
    <?php
    $accordion_id = "accordion-$id";
    $accordion_title_id = "accordion-title-$id";

    //open parent div
    if ($current === 1) {
        echo "<div class='accordion' itemscope='' itemtype='https://schema.org/FAQPage'>";
    }
    ?>
    <div class="accordion__item" data-animate itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
        <h3 class="accordion__title h5" itemprop="name">
            <button id="<?= $accordion_title_id; ?>" aria-expanded="false" aria-controls="<?= $accordion_id; ?>" class="accordion__button button">
                <span class="accordion__label"><?= esc_html($title); ?></span>
                <?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'accordion__icon']); ?>
            </button>
        </h3>
        <div id="<?= $accordion_id; ?>" class="accordion__content element-collapse" aria-labelledby="<?= $accordion_title_id; ?>" role="region" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <?= get_core_accordion_first_p($text); ?>
        </div>
    </div>
<?php
    //close parent div
    if ($current === $total) {
        echo "</div>";
    }
endif;

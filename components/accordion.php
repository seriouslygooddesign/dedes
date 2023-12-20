<?php
extract(wp_parse_args($args, [
    'title' => get_sub_field('title'),
    'label_class' => 'accordion__label',
    'content_class' => '',
    'text' => get_sub_field('text'),
    'total' => 0,
    'current' => 1, // Start from 1
    'id' => wp_unique_id(),
    'faq_schema' => false,
]));

if ($total < 1) return;

$faq_schema_page = $faq_schema_question = $faq_schema_name = $faq_schema_answer = $faq_schema_text = '';

if ($faq_schema) {
    $faq_schema_page = "itemscope itemtype='https://schema.org/FAQPage'";
    $faq_schema_question = "itemscope itemprop='mainEntity' itemtype='https://schema.org/Question'";
    $faq_schema_name = "itemprop='name'";
    $faq_schema_answer = "itemscope itemprop='acceptedAnswer' itemtype='https://schema.org/Answer'";
    $faq_schema_text = "itemprop='text'";
}

$accordion_id = "accordion-$id";
$accordion_title_id = "accordion-title-$id";
$label_class = $label_class ? "class='$label_class'" : null;

if ($current === 1) echo "<div class='accordion' $faq_schema_page>"; //open parent div
?>
<div class="accordion__item" data-animate <?= $faq_schema_question; ?>>
    <h3 class="accordion__title h5">
        <button type="button" id=" <?= $accordion_title_id; ?>" aria-expanded="false" aria-controls="<?= $accordion_id; ?>" class="accordion__button button">
            <span <?= $label_class; ?> <?= $faq_schema_name; ?>><?= esc_html($title); ?></span>
            <?php get_template_part('components/site-icon', null, ['icon' => 'chevron', 'class' => 'accordion__icon']); ?>
        </button>
    </h3>
    <div id="<?= $accordion_id; ?>" class="accordion__content <?= $content_class; ?> element-collapse" aria-labelledby="<?= $accordion_title_id; ?>" role="region" <?= $faq_schema_answer; ?>>
        <div <?= $faq_schema_text; ?>>
            <?= $text;  ?>
        </div>
    </div>
</div>
<?php if ($current === $total) echo "</div>"; //close parent div

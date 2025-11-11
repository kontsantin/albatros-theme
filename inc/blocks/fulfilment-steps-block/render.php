<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$title = get_field('fs_title');
$steps = get_field('fs_steps') ?: array();

// common settings
$blockPadd = get_field('block-padd');
// иногда поле могло быть зарегистрировано с другим именем (underscore), возьмём оба варианта
$bgColor = get_field('bg-color');
if (empty($bgColor)) $bgColor = get_field('bg_color');
$titleColor = get_field('title-color');
if (empty($titleColor)) $titleColor = get_field('title_color');
$itemColor = get_field('item-color');
if (empty($itemColor)) $itemColor = get_field('item_color');

?>
<?php
// Prepare inline style for section
$section_style = '';
if (!empty($blockPadd)) $section_style .= 'padding:'.esc_attr($blockPadd).';';
if (!empty($bgColor)) $section_style .= 'background-color:'.esc_attr($bgColor).';';
?>
<section class="fulfilment-steps-block <?= esc_attr($classes); ?> <?= esc_attr($align); ?>" <?php if($section_style) echo 'style="'.esc_attr($section_style).'"'; ?>>
    <div class="container">
            <?php if (!empty($title)) : ?>
                <?php $title_mode = get_field('fs_title_mode') ?: 'default'; ?>
                <?php if ($title_mode === 'plain') : ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php else: ?>
                    <h2 class="fulfilment-steps__title" <?php if(!empty($titleColor)) echo 'style="color:'.esc_attr($titleColor).';"'; ?>><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            <?php endif; ?>

        <?php if (!empty($steps)) : ?>
            <div class="fulfilment-steps__list">
                <?php foreach ($steps as $step):
                    $img_id = $step['image'] ?? '';
                    $caption = $step['caption'] ?? '';
                ?>
                    <figure class="fulfilment-step">
                        <?php if (!empty($img_id)) : ?>
                            <div class="fulfilment-step__media"><?php echo wp_get_attachment_image($img_id, 'large'); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($caption)) : ?>
                            <figcaption class="fulfilment-step__caption" <?php if(!empty($itemColor)) echo 'style="color:'.esc_attr($itemColor).';"'; ?>><?php echo esc_html($caption); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php if (is_admin()) : ?>
                <div class="fulfilment-steps__placeholder">Добавьте шаги — изображение и подпись</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

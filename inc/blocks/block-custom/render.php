<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$fields = get_fields();

$layoutType = $fields['layout_type'] ?? 'default';
$blockTitle = $fields['block_title'] ?? '';
$blockText = $fields['block_text'] ?? '';
$iconsItems = $fields['icons_items'] ?? array();
$bgColor = $fields['bg_color'] ?? '';
$textColor = $fields['text_color'] ?? '';

// Ранее при пустом наборе элементов возвращался пустой вывод —
// это мешало корректному отображению блока в редакторе (отсутствовал контейнер и, как следствие, "аккордеон").
// Теперь рендерим плейсхолдер, если элементов нет — чтобы в админке блок был виден и сворачиваем.

// Проверим, есть ли у элементов описание (iconText). Если есть — добавим модификатор к сетке
$has_icon_text = false;
if (!empty($iconsItems) && is_array($iconsItems)) {
    foreach ($iconsItems as $itm) {
        if (!empty($itm['text'])) {
            $has_icon_text = true;
            break;
        }
    }
}
?>
<section class="custom-content-icons-block <?php echo $classes; ?> <?php echo $align; ?>" 
    <?php if($bgColor || $textColor) { ?>style="<?php if($bgColor) echo 'background-color:'.$bgColor.';'; ?><?php if($textColor) echo 'color:'.$textColor.';'; ?>"<?php } ?>>
    <div class="container">
        <div class="content-icons-wrapper <?php if($layoutType === 'reversed') echo 'reversed'; ?>">
            <!-- Левая часть - Контент -->
            <div class="content-part">
                <?php if(!empty($blockTitle)) { ?>
                    <h2 class="content-title" <?php if($textColor) { ?>style="color:<?php echo $textColor; ?>;"<?php } ?>>
                        <?php echo esc_html($blockTitle); ?>
                    </h2>
                <?php } ?>
                
                <?php if(!empty($blockText)) { ?>
                    <div class="content-text" <?php if($textColor) { ?>style="color:<?php echo $textColor; ?>;"<?php } ?>>
                        <?php echo apply_filters('the_content', $blockText); ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Правая часть - Иконки -->
            <div class="icons-part">
                        <div class="icons-grid<?php if(!empty($has_icon_text)) echo ' icons-grid--with-text'; ?>">
                            <?php if (!empty($iconsItems)) : ?>
                                <?php foreach($iconsItems as $item) {
                                    $iconId = $item['icon'] ?? '';
                                    $iconTitle = $item['title'] ?? '';
                                    $iconText = $item['text'] ?? '';
                                ?>
                                    <div class="icon-item">
                                        <?php if(!empty($iconId)) { ?>
                                            <div class="icon-image">
                                                <?php echo wp_get_attachment_image($iconId, 'medium'); ?>
                                            </div>
                                        <?php } ?>
                                    
                                        <?php if(!empty($iconTitle)) { ?>
                                            <h3 class="icon-title" <?php if($textColor) { ?>style="color:<?php echo $textColor; ?>;"<?php } ?>>
                                                <?php echo esc_html($iconTitle); ?>
                                            </h3>
                                        <?php } ?>
                                    
                                        <?php if(!empty($iconText)) { ?>
                                            <div class="icon-text" <?php if($textColor) { ?>style="color:<?php echo $textColor; ?>;"<?php } ?>>
                                                <?php echo wpautop(esc_html($iconText)); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php else: ?>
                               
                            <?php endif; ?>
                        </div>
            </div>
        </div>
    </div>
</section>
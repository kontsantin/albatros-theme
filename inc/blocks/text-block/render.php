<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$descr = get_field('descr');
$img = get_field('img');

$blockTopPadd = get_field('block-top-padd');
$blockBotPadd = get_field('block-padd-bot');
$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$textColor = get_field('text-color');

//  Проверка на наличие картинки
$has_img = !empty($img);

$layout_class = $has_img ? 'text--with-img' : 'text--no-img';
?>
<section id="text-block" class="text-block text <?= esc_attr("$classes $align $layout_class"); ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>
    <?php if($blockTopPadd){ ?>margin-top:<?=$blockTopPadd?>px;<?php } ?><?php if($blockBotPadd){ ?>margin-bottom:<?=$blockBotPadd?>px;<?php } ?>">

    <div class="container">
        <div class="text__left">
            <?php if($has_img) { ?>
                <div class="text-img">
                    <img src="<?= esc_url($img) ?>" alt="seo-img">
                </div>
            <?php } ?>
        </div>

        <div class="text__right">
            <?php if (!empty($title)) { ?>
                <h2 class="text__title" <?php if($titleColor){ ?>style="color:<?= esc_attr($titleColor) ?>;"<?php } ?>>
                    <?= esc_html($title) ?>
                </h2>
            <?php } ?>

            <?php if (!empty($descr)) { ?>
                <div class="text__descr p1" <?php if($textColor){ ?>style="color:<?= esc_attr($textColor) ?>;"<?php } ?>>
                    <?= wp_kses_post($descr) ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
    .text-block .container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;  
}

/* ✅ Если нет изображения — одна колонка на всю ширину */
.text--no-img .container {
  grid-template-columns: 1fr;
}

/* Чтобы правый блок занял всю ширину */
.text--no-img .text__right {
  grid-column: 1 / -1;
  text-align: left;
}

/* Если нужно центрировать содержимое, можно добавить: */
.text--no-img .text__right {  
  margin: 0 auto;
}
/* #text-block h2 {
	font-size: 20px;
	margin-bottom: 20px;
	margin-top: 20px;
	color: black!important;
} */
.text-block.text--no-img .text__title {
  margin-bottom: 20px;
  font-size: 28px;
}
#text-block.text-block.text--no-img .text__right {
    padding-top: 0px;
    padding-left: 0px;
}
</style>
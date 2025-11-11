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

?>
<section id="text-block" class="text-block text <?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>
    <?php if($blockTopPadd){ ?>margin-top:<?=$blockTopPadd?>px;<?php } ?><?php if($blockBotPadd){ ?>margin-bottom:<?=$blockBotPadd?>px;<?php } ?>"
>
    <div class="container">
        <div class="text__left">
            <?php if(!empty($img)) { ?>
                <div class="text-img">
                    <img src="<?=$img?>" alt="seo-img">
                </div>
            <?php } ?>
        </div>
        <div class="text__right">
            <?php if (!empty($title)): { ?>
                <h2 class="text__title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
            <?php if (!empty($descr)): { ?>
                <div class="text__descr p1" <?php if($textColor){ ?>style="color:<?=$textColor?>;"<?php } ?>>
                    <?= $descr ?>
                </div>
            <?php }endif ?>
        </div>
    </div>
</section>
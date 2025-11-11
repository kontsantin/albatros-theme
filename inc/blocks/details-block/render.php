<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$details = get_field('details');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$count = get_field('count');
$elColor = get_field('item-color');
$nameColor = get_field('name-color');

?>
<section id="info-block" class="info-block info <?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
        <?php if (!empty($details)): { ?>
                <div class="info__list"
                    <?php if($count){ ?>style="grid-template-columns:repeat(<?=$count?>,1fr);"<?php } ?>
                >
                    <?php foreach ($details as $item): ?>
                        <div class="info__item" <?php if($elColor){ ?>style="background-color:<?=$elColor?>;"<?php } ?>>
                            <?php if(!empty($item['icon'])) { ?>
                                <div class="info__icon">
                                    <img src="<?=$item['icon']?>" alt="icon">
                                </div>
                            <?php } ?>
                            <?php if(!empty($item['text'])) { ?>
                                <div class="h4 info__text" <?php if($nameColor){ ?>style="color:<?=$nameColor?>;"<?php } ?>>
                                    <?= $item['text'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php }endif ?>
    </div>
</section>
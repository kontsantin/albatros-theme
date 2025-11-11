<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$descr = get_field('descr');
$list = get_field('list');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$count = get_field('count');
$itemColor = get_field('item-color');
$itemTitleColor = get_field('item-title-color');
$charNameColor = get_field('char-name-color');
$charValueColor = get_field('char-value-color');
$descColor = get_field('desc-color');

?>
<section id="shipping-block" class="shipping-block shipping <?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
        <?php if (!empty($descr)): { ?>
                <p class="p1 shipping__descr" <?php if($descColor){ ?>style="color:<?=$descColor?>;"<?php } ?>>
                    <?= $descr ?>
                </p>
            <?php }endif ?>
        <?php if (!empty($list)): { ?>
                <div class="shipping__list"
                    <?php if($count){ ?>style="grid-template-columns:repeat(<?=$count?>,1fr);"<?php } ?>
                >
                    <?php foreach ($list as $item): ?>
                        <div class="shipping__item" <?php if($itemColor){ ?>style="background-color:<?=$itemColor?>;"<?php } ?>>
                            <?php if(!empty($item['title'])) { ?>
                                <div class="item__title h4" <?php if($itemTitleColor){ ?>style="color:<?=$itemTitleColor?>;"<?php } ?>>
                                    <?= $item['title'] ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($item['points'])): { ?>
                                    <ul class="item__list">
                                        <?php foreach ($item['points'] as $point): ?>
                                            <li class="item__points">
                                                <?php if(!empty($point['left'])) { ?>
                                                    <p class="point__left p1" <?php if($charNameColor){ ?>style="color:<?=$charNameColor?>;"<?php } ?>>
                                                        <?= $point['left'] ?>
                                                    </p>
                                                <?php } ?>
                                                <?php if(!empty($point['right'])) { ?>
                                                    <div class="point__right h6" <?php if($charValueColor){ ?>style="color:<?=$charValueColor?>;"<?php } ?>>
                                                        <?= $point['right'] ?>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php }endif ?>
                                <?php if(!empty($item['image'])) { ?>
                                    <div class="item__img">
                                        <img src="<?= $item['image'] ?>" alt="shipping-img">
                                    </div>
                                <?php } ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php }endif ?>
    </div>
</section>
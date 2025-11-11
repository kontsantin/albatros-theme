<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$comprasion_list = get_field('comprasion_list');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$count = get_field('count');
$itemBgColor = get_field('item-bg-color');
$itemInColor = get_field('item-in-bg-color');
$nameColor = get_field('name-color');
$lastInColor = get_field('last-in-color');
$lastNameColor = get_field('last-name-color');

?>
<section id="comprasion-block" class="comprasion-block comprasion<?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
        <?php if (!empty($comprasion_list)): { ?>
                <div class="comprasion__wrapper" <?php if($count){ ?>style="grid-template-columns:repeat(<?=$count?>,1fr);"<?php } ?>>
                    <?php foreach ($comprasion_list as $item): ?>
                        <div class="comprasion__item" <?php if($itemBgColor){ ?>style="background-color:<?=$itemBgColor?>;"<?php } ?>>
                            <div class="comprasion__left" <?php if($itemInColor){ ?>style="background-color:<?=$itemInColor?>;"<?php } ?>>
                                <?php if (!empty($item['img'])): { ?>
                                    <div class="comprasion__img">
                                        <img src="<?= $item['img'] ?>" alt="">
                                    </div>
                                <?php }endif ?>
                                <?php if(!empty($item['title'])) { ?>
                                    <p class=" p1 comprasion__title" <?php if($nameColor){ ?>style="color:<?=$nameColor?>;"<?php } ?>>
                                        <?= $item['title'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="comprasion__right">
                                <?php if (!empty($item['name-top']) or !empty($item['price-top'])) : { ?>
                                    <div class="comprasion__top" <?php if($itemInColor){ ?>style="background-color:<?=$itemInColor?>;"<?php } ?>>
                                    <?php if(!empty($item['name'])) { ?>
                                        <p class="comprasion__name p1" <?php if($nameColor){ ?>style="color:<?=$nameColor?>;"<?php } ?>>
                                            <?= $item['name-top'] ?>
                                        </p>
                                    <?php } ?>
                                    <?php if(!empty($item['price-top'])) { ?>
                                        <h5 class="comprasion__price" <?php if($nameColor){ ?>style="color:<?=$nameColor?>;"<?php } ?>>
                                            <?= $item['price-top'] ?>
                                        </h5>
                                    <?php } ?>
                                </div>
                                <?php } endif?>
                                <?php if (!empty($item['name-bottom']) or !empty($item['price-bottom'])) : { ?>
                                    <div class="comprasion__bottom" <?php if($lastInColor){ ?>style="background-color:<?=$lastInColor?>;"<?php } ?>>
                                    <?php if(!empty($item['name-bottom'])) { ?>
                                        <p class="comprasion__name p1" <?php if($lastNameColor){ ?>style="color:<?=$lastNameColor?>;"<?php } ?>>
                                            <?= $item['name-bottom'] ?>
                                        </p>
                                    <?php } ?>
                                    <?php if(!empty($item['price-bottom'])) { ?>
                                        <h5 class="comprasion__price" <?php if($lastNameColor){ ?>style="color:<?=$lastNameColor?>;"<?php } ?>>
                                            <?= $item['price-bottom'] ?>
                                        </h5>
                                    <?php } ?>
                                </div>
                                <?php } endif?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php }endif ?>
    </div>
</section>
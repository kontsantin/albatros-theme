<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$descr = get_field('descr');
$products = get_field('products');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$descColor = get_field('desc-color');
$itemBgColor = get_field('item-bg-color');
$itemColor = get_field('item-color');

?>
<section id="products-block" class="products-block products<?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <div class="products__top">
            <?php if (!empty($title)): { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
            <?php if (!empty($descr)): { ?>
                <p class="p1 products__descr" <?php if($descColor){ ?>style="color:<?=$descColor?>;"<?php } ?>>
                    <?= $descr ?>
                </p>
            <?php }endif ?>
        </div>
        <?php if (!empty($products)): { ?>
            <div class="products__wrapper">
                <?php foreach ($products as $id => $item): ?>
                    <div class="products__item products__item-<?= $id + 1 ?>" <?php if($itemBgColor){ ?>style="background-color:<?=$itemBgColor?>;"<?php } ?>>
                        <?php if (!empty($item['img'])): { ?>
                            <div class="products__img">
                                <img src="<?= $item['img'] ?>" alt="">
                            </div>
                        <?php }endif ?>
                        <?php if (!empty($item['title'])) : { ?>
                            <h4 class="products__title" <?php if($itemColor){ ?>style="color:<?=$itemColor?>;"<?php } ?>>
                                <?= $item['title'] ?>
                            </h4>
                        <?php } endif?>
                    </div>
                <?php endforeach ?>
            </div>
        <?php }endif ?>
    </div>
</section>
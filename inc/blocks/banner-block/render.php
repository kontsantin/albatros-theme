<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';



global $post;

$title = get_the_title($post);
$short_descr = get_field('short_descr');
$descr = get_field('descr');
$price = get_field('price');
$img = get_the_post_thumbnail_url($post);
$showBtn = get_field('show_btn');
$list = get_field('list');

$blockPadd = get_field('block-bot-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$descColor = get_field('text-color');
$shortDescColor = get_field('short-desc-color');

?>
<section id="banner-block" class="banner-block banner<?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>margin-bottom:<?=$blockPadd?>;<?php } ?>"
>
    <div class="container" <?php if($bgColor){ ?>style="background-color:<?=$bgColor?>"<?php } ?>>
        <div class="banner__content">
            <?php if (!empty($title)): { ?>
                    <h1 class="banner__title page-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                        <?= $title ?>
                    </h1>
                <?php }endif ?>
            <?php if (!empty($short_descr)): { ?>
                    <h4 class="banner__short_descr" <?php if($shortDescColor){ ?>style="color:<?=$shortDescColor?>;"<?php } ?>>
                        <?= $short_descr ?>
                    </h4>
                <?php }endif ?>
            <?php if (!empty($descr)): { ?>
                    <p class="p1 banner__descr" <?php if($descColor){ ?>style="color:<?=$descColor?>;"<?php } ?>>
                        <?= $descr ?>
                    </p>
                <?php }endif ?>
			
			<?php if (!empty($price)): { ?>
			<div class="price__holder">
				
				<p class="p1 banner__descr">
					Стоимость:
				</p>
				
				
                    <p class="p1 banner__price">
                        <?= $price ?>
                    </p>
                
			</div>
			<?php }endif ?>
			
			
            <?php if (!empty($list)): { ?>
                    <div class="banner__list">
                        <?php foreach ($list as $item): ?>
                            <div class="banner__item">
                                <?php if(!empty($item['icon'])) { ?>
                                    <div class="banner__icon">
                                        <img src="<?= $item['icon'] ?>" alt="">
                                    </div>
                                <?php } ?>
                                <?php if(!empty($item['text'])) { ?>
                                    <div class="banner__text p1">
                                        <?= $item['text'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php }endif ?>
            <?php if (!empty($showBtn)) : { ?>
                <button data-modal data-src="#modal-callback" class="btn banner__btn">
                Оставить заявку на консультацию
            </button>
            <?php } endif?>
        </div>
        <?php if (!empty($img)): { ?>
                <div class="banner__img">
                    <img src="<?= $img ?>" alt="banner-img">
                </div>
            <?php }endif ?>
    </div>
</section>
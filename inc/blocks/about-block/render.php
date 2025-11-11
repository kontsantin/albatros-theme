<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$descr = get_field('descr');
$reviews_link = get_field('reviews_link');
$btn_link = get_field('btn_link');
$star_count = get_field('star_count');
$bg = get_field('bg');
$benefits = get_field('benefits');
$rate_text = get_field('rate_text');
$rate_text_second = get_field('rate_text_second');
$descr_with_icons = get_field('descr_with_icons');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$infoBgColor = get_field('bg-info-color');
$achivesColor = get_field('achives-color');
$numberColor = get_field('number-color');
$achiveDescColor = get_field('achive-desc-color');
$rateBgColor = get_field('rate-bg-color');
$rateTitleColor = get_field('rate-title-color');
$rateDescColor = get_field('rate-desc-color');
$titleColor = get_field('title-color');
$textColor = get_field('text-color');
$iconColor = get_field('icon-color');

?>
<section id="about-block" class="about-block about<?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($bg)): { ?>
            <div class="about__bg">
                <img src="<?= $bg ?>" alt="">
            </div>
        <?php }endif ?>
        <div class="about__wrapper" <?php if($infoBgColor){ ?>style="background-color:<?=$infoBgColor?>;"<?php } ?>>
            <div class="about__left">
                <div class="about__list">
                    <li class="about__item" <?php if($rateBgColor){ ?>style="background-color:<?=$rateBgColor?>;"<?php } ?>>
                        <div class="about__item-rate" <?php if($rateTitleColor){ ?>style="color:<?=$rateTitleColor?>;"<?php } ?>>
                            Нам доверяют!
                            <div class="star-rating" style="--rating: <?= strval($star_count/5*100) . '%' ?>"></div>
                        </div>
                        <?php if (!empty($rate_text)): { ?>
                            <div class="about__item-text" <?php if($rateDescColor){ ?>style="color:<?=$rateDescColor?>;"<?php } ?>>
                                <?= $rate_text ?>
                            </div>
                        <?php }endif ?>
                        <?php if (!empty($rate_text)): { ?>
                            <p class="about__item-text_second p2" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                                <?= $rate_text_second ?>
                            </p>
                        <?php }endif ?>
                        <?php if (!empty($reviews_link)): { ?>
                            <a class="btn invert" href="<?= $reviews_link ?>">
                                Смотреть отзывы
                            </a>
                        <?php }endif ?>
                    </li>
                    <?php if (!empty($benefits)): { ?>
                        <?php foreach ($benefits as $item): ?>
                            <li class="about__item" <?php if($achivesColor){ ?>style="background-color:<?=$achivesColor?>;"<?php } ?>>
                                <?php if(!empty($item['title'])) { ?>
                                    <p class="num about__item-title" <?php if($numberColor){ ?>style="color:<?=$numberColor?>;"<?php } ?>>
                                        <?= $item['title'] ?>
                                    </p>
                                <?php } ?>
                                <?php if(!empty($item['descr'])) { ?>
                                    <p class="p1 about__item-descr" <?php if($achiveDescColor){ ?>style="color:<?=$achiveDescColor?>;"<?php } ?>>
                                        <?= $item['descr'] ?>
                                    </p>
                                <?php } ?>
                            </li>
                        <?php endforeach ?>
                    <?php }endif ?>
                </div>
            </div>
            <div class="about__right">
                <?php if (!empty($title)): { ?>
                    <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                        <?= $title ?>
                    </h2>
                <?php }endif ?>
                <?php if (!empty($descr)): { ?>
                    <p class="p1 about__descr" <?php if($textColor){ ?>style="color:<?=$textColor?>;"<?php } ?>>
                        <?= $descr ?>
                    </p>
                <?php }endif ?>
                <?php if (!empty($descr_with_icons)): { ?>
                    <?php foreach ($descr_with_icons as $item): ?>
                        <div class="about__descr_with_icons">
                            <?php if(!empty($item['icon'])) { ?>
                                <div class="about__descr-icon" <?php if($iconColor){ ?>style="background-color:<?=$iconColor?>;"<?php } ?>>
                                    <img src="<?= $item['icon'] ?>" alt="">
                                </div>
                            <?php } ?>
                            <?php if(!empty($item['text'])) { ?>
                                <p class="p1" <?php if($textColor){ ?>style="color:<?=$textColor?>;"<?php } ?>>
                                    <?= $item['text'] ?>
                                </p>
                            <?php } ?>
                        </div>
                    <?php endforeach ?>
                <?php }endif ?>
                <?php if (!empty($btn_link)): { ?>
                    <a href="<?= $btn_link ?>" class="about__btn-more btn invert">
                        Подробнее
                    </a>
                <?php }endif ?>
            </div>
        </div>
    </div>
</section>
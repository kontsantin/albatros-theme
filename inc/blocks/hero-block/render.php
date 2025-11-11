<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$subtitle_icon = get_field('subtitle_icon');
$subtitle = get_field('subtitle');
$list = get_field('list');
$btn_text = get_field('btn_text');
$video = get_field('video');
$descr = get_field('descr');

$bgColor = get_field('bg-color');
$opacity = get_field('opacity');
$subBgColor = get_field('sub-bg');
$subColor = get_field('sub-color');
$titleColor = get_field('title-color');
$advantIconColor = get_field('icon-bg-color');
$advantColor = get_field('adavnt-color');
$textBtnColor = get_field('text-btn-color');
$textBgColor = get_field('text-bg-color');
$descColor = get_field('desc-color');
$descBgColor = get_field('desc-bg-color');

?>
<section id="hero-block" class="hero <?= $classes; ?> <?= $align; ?>"
    style="<?php if ($bgColor) { ?>background-color:<?= $bgColor ?>;<?php } ?>">
    <?php if (!empty($opacity)) { ?>
        <div class="block-before" <?php if ($opacity) { ?>style="background-color:<?= $opacity ?>;" <?php } ?>></div>
    <?php } ?>
    <div class="container">
        <div class="for_text">
            <?php if (!empty($subtitle)): { ?>
                    <div class="hero__subtitle" <?php if ($subBgColor) { ?>style="background-color:<?= $subBgColor ?>;" <?php } ?>>
                        <?php if (!empty($subtitle_icon)) { ?>
                            <img src="<?= $subtitle_icon ?>" alt="hero_subtitle_icon">
                        <?php } ?>
                        <p class="p1" <?php if ($subColor) { ?>style="color:<?= $subColor ?>;" <?php } ?>>
                            <?= $subtitle ?>
                        </p>
                    </div>
                <?php }endif ?>
            <?php if (!empty($title)): { ?>
                    <h1 class="hero__title" <?php if ($titleColor) { ?>style="color:<?= $titleColor ?>;" <?php } ?>>
                        <?= $title ?>
                    </h1>
                <?php }endif ?>
            <?php if (!empty($list)): { ?>
                    <ul class="list">
                        <?php foreach ($list as $item): ?>
                            <li class="list__item">
                                <?php if (!empty($item['icon'])) { ?>
                                    <div class="list__icon" <?php if ($advantIconColor) { ?>style="background-color:<?= $advantIconColor ?>;" <?php } ?>>
                                        <img src=" <?= $item['icon'] ?>" alt="list_icon">
                                    </div>
                                <?php } ?>
                                <?php if (!empty($item['text'])) { ?>
                                    <p class="p1" <?php if ($advantColor) { ?>style="color:<?= $advantColor ?>;" <?php } ?>>
                                        <?= $item['text'] ?>
                                    </p>
                                <?php } ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php }endif ?>
            <div class="hero__btn-wrapper" <?php if ($textBgColor) { ?>style="background-color:<?= $textBgColor ?>;" <?php } ?>>
                <button data-modal data-src="#modal-callback" class="btn">
                    Оставить заявку
                </button>
                <?php if (!empty($btn_text)) { ?>
                    <p class="p1" <?php if ($textBtnColor) { ?>style="color:<?= $textBtnColor ?>;" <?php } ?>>
                        <?= $btn_text ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if (!empty($video)) { ?>
        <div class="video">
            <video autoplay muted loop playsinline>
                <source autoplay src="<?= $video; ?>">
            </video>
        </div>
    <?php } ?>
</section>
<div class="container">
    <?php if (!empty($descr)): { ?>
            <p class="hero__descr p1"
                style="<?php if ($descColor) { ?>color:<?= $descColor ?>;<?php } ?><?php if ($descBgColor) { ?>background-color:<?= $descBgColor ?>;<?php } ?>">
                <?= $descr ?>
            </p>
        <?php }endif ?>
</div>
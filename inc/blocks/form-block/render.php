<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$bg = get_field('bg');
$descr = get_field('descr');
$social_text = get_field('social_text');
$socials = @settings('socials');

$blockPadd = get_field('block-padd');
$titleColor = get_field('title-color');
$descColor = get_field('desc-color');
$socColor = get_field('soc-color');
$socBgColor = get_field('text-bg-color');

?>
<section id="form-block" class="form-block form<?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?>"
>
    <div class="container form__container" style="background-image: url(<?= $bg ?>) ">
        <div class="form__left">
            <?php if (!empty($title)): { ?>
                    <h2 class="form__title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                        <?= $title ?>
                    </h2>
                <?php }endif ?>
            <?php if (!empty($descr)): { ?>
                    <div class="form__descr" <?php if($descColor){ ?>style="color:<?=$descColor?>;"<?php } ?>>
                        <?= $descr ?>
                    </div>
                <?php }endif ?>
        </div>
        <div class="form__right">
            <div class="form-social__wrapper" <?php if($socBgColor){ ?>style="background-color:<?=$socBgColor?>;"<?php } ?>>
                <div class="form__socials">
                    <?php if (!empty($socials)): ?>
                        <div class="soc-holder">
                            <?php foreach ($socials as $item) { ?>
                                <a target="_blank" href="<?= $item['value']; ?>" class="soc">
                                    <?= get_image($item['icon'], [24, 24]); ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($social_text)): { ?>
                        <p class="form-social__text p2" <?php if($socColor){ ?>style="color:<?=$socColor?>;"<?php } ?>>
                            <?= $social_text ?>
                        </p>
                    <?php }endif ?>
                </div>
                
            </div>
            <?php get_template_part('inc/parts/forms/form-block'); ?>
        </div>
</section>
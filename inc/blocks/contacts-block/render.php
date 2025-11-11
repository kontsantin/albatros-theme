<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$phones = @settings('phones');
$socials = @settings('socials');
$emails = @settings('emails');

$addresses = @settings('addresses');

?>
<section id="contacts-block" class="contacts-block contacts<?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <div class="contacts__wrapper grid">
            <div class="contacts__column">
                <?php if ($phones) { ?>
                    <div class="phones-holder contacts__item">
                        <p class="p2 contacts__name">Телефон</p>
                        <?php foreach ($phones as $phone): ?>
                            <a href="<?= format('phone', $phone['value']); ?>" class="phone h3">
                                <?= $phone['value']; ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php } ?>
                <?php if (!empty($emails)): { ?>
                    <div class="emails-holder contacts__item">
                        <p class="p2 contacts__name">Электронная почта</p>
                        <?php foreach ($emails as $email): ?>
                            <a href="<?= format('email', $email['value']); ?>" class="email h3">
                                <?= $email['value']; ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php }endif ?>
                <?php if(!empty($addresses)) { ?>
                    <div class="header__contacts addresses">
                        <p class="p2 contacts__name">Адрес</p>
                        <div class="header__contacts-value">
                            <?=$addresses[0]['value'];?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="contacts__column">
                <?php get_template_part('inc/parts/forms/form-contacts'); ?>
            </div>
            <div class="contacts__column contacts__column-socials">
                <p class="p2">
                    Неудобно оставлять заявку свяжитесь через социальные сети
                </p>
                <?php if (!empty($socials)): { ?>
                        <div class="soc-holder">
                            <?php foreach ($socials as $social): ?>
                                <a target="_blank" class="social__link" href="<?= $social['value'] ?>">
                                    <?= get_image($social['icon'], [24, 24]); ?>
                                </a>
                            <?php endforeach ?>
                        </div>
                    <?php }endif ?>
            </div>
        </div>
        <?= render_map() ?>
    </div>
</section>
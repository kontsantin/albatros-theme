<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme
 */
$type = theme('type');
$logo = @settings('logotype');
$siteTitle = theme('site-title');
$phones = @settings('phones');
$socials = @settings('socials');
$emails = @settings('emails');
$header_star_link = @settings('header_star_link');
$rating_link = @settings('rating_link');
$addresses = @settings('addresses');


$header_color = @settings('header_color');
$header_text = @settings('header_text');

$white = theme('white');
$primary = theme('primary');
$hover = theme('hover');
$bg = theme('bg-light');
$bgDark = theme('bg-dark');
$gray = theme('gray');
$head = theme('head');
$mainText = theme('main-text');
$green = theme('green');
$red = theme('red');

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="google-site-verification" content="MMG6yBvpbcHlH-80LOs2KSBmnlcgwjXVE2qLIftBDuI" />
	<meta name="yandex-verification" content="e6f3c7fe80c59b74" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <style>
        body {
            --white:
                <?= $white ?>
            ;
            --primary:
                <?= $primary ?>
            ;
            --hover:
                <?= $hover ?>
            ;
            --background:
                <?= $bg ?>
            ;
            --background-2:
                <?= $bgDark ?>
            ;
            --gray:
                <?= $gray ?>
            ;
            --text:
                <?= $mainText ?>
            ;
            --head:
                <?= $head ?>
            ;
            --green:
                <?= $greeen ?>
            ;
            --red:
                <?= $red ?>
            ;
            --fontFamily: "Montserrat";
        }
    </style>
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <header id="header" class="site-header header">
        <div class="header__container">
            <div class="logo">
                <a href="/" class="header__logo logo"><img src="<?= $logo ?>" alt=""></a>
                <a href="/" class="header__logo title"><?php echo $siteTitle ?></a>
            </div>
            <div class="header__info">
                <?php if (!empty($header_text) or !empty($header_color)): { ?>
                        <div class="p2 header__text">
                            <!-- <div class="header__marker" style="background:<?= $header_color ?>"></div> -->
                            <?= $header_text ?>
                        </div>
                <?php }endif ?>
				
                <div class="contact_holder">
					
                        <?php if (!empty($emails)) { ?>
                            <?php foreach ($emails as $email) { ?>
                                <div class="contact email">
                                    <div class="contact__top">
                                        <?php if ($email['icon']) { ?>
                                            <?= wp_get_attachment_image($email['icon']); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="contact__bottom p2">
                                        <?= $email['value'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
				
                    <?php if (!empty($addresses)) { ?>
                        <?php foreach ($addresses as $address) { ?>
                            <div class="contact addr">
                                <div class="contact__top">
                                    <?php if ($address['icon']) { ?>
                                        <?= wp_get_attachment_image($address['icon']); ?>
                                    <?php } ?>
                                </div>
                                <div class="contact__bottom p2">
                                    <?= $address['value'] ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
					
				</div>

                
                <?php if ($phones) { ?>
                    <div class="phones-holder">
                        <!-- <?php if (!empty($header_text) or !empty($header_color)): { ?>
                                <span class="p3">
                                    <?= $phones[0]['name'] ?>
                                </span>
                            <?php }endif ?> -->
						
						<span class="addr_span p2">
							Для Москвы:
						</span>
                        <a href="<?= format('phone', $phones[0]['value']); ?>" class="phone p2">
                            <?= $phones[0]['value']; ?>
                        </a>
                        
                    </div>
                <?php } ?>
				
				<?php if ($phones) { ?>
                    <div class="phones-holder">
                        <!-- <?php if (!empty($header_text) or !empty($header_color)): { ?>
                                <span class="p3">
                                    <?= $phones[0]['name'] ?>
                                </span>
                            <?php }endif ?> -->
						
						<span class="addr_span p2">
							Для России:
						</span>
                        <a href="<?= format('phone', $phones[1]['value']); ?>" class="phone p2">
                            <?= $phones[1]['value']; ?>
                        </a>
                        
                    </div>
                <?php } ?>

                <?php if (!empty($socials)): ?>
                    <div class="soc-holder header__socials">
                        <?php foreach ($socials as $item) { ?>
                            <a target="_blank" href="<?= $item['value']; ?>" class="soc">
                                <?= get_image($item['icon'], [24, 24]); ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php endif ?>
            </div>

            <div class="burger open_menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav class="header__menu__bot">
            <?php
            wp_nav_menu([
                'theme_location' => 'menuTop',
                'container' => false,
                'menu' => 'Главное слево',
                'menu_class' => 'header__list',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 2,
            ]);
            ?>

            <?php
            wp_nav_menu([
                'theme_location' => 'menuTop',
                'container' => false,
                'menu' => 'Главное справо',
                'menu_class' => 'header__list',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 2,
            ]);
            ?>
            <button data-modal data-src="#modal-callback" class="btn">
                Обратный звонок
            </button>

        </nav>
        <div id="mobile-mnu">
            <div id="close-mnu">+</div>
            <?php if ($type === true) { ?>
                <a href="/" class="header__logo logo"><img src="<?= $logo ?>" alt=""></a>
            <?php } ?>
            <?php if ($type === "" && !empty($siteTitle)) { ?>
                <a href="/" class="header__logo title"><?php echo $siteTitle ?></a>
            <?php } ?>
            <?php
            wp_nav_menu([
                'theme_location' => 'menuTop',
                'container' => false,
                'menu' => 'Главное слево',
                'menu_class' => 'header__list',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 2,
            ]);
            ?>
            <?php
            wp_nav_menu([
                'theme_location' => 'menuTop',
                'container' => false,
                'menu' => 'Главное справо',
                'menu_class' => 'header__list',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'depth' => 2,
            ]);
            ?>

            <?php if (!empty($emails)): ?>
                <div class="emails-holder">
                    <?php foreach ($emails as $email) { ?>
                        <a href="<?= format('email', $email['value']); ?>" class="email p1">
                            <?php echo $email['value']; ?>
                        </a>
                    <?php } ?>
                </div>
            <?php endif ?>
            <?php if (!empty($addresses)): ?>
                <div class="address-holder">
                    <?php foreach ($addresses as $address) { ?>
                        <div class="address">
                            <?= $address['value']; ?>
                        </div>
                    <?php } ?>
                </div>
            <?php endif ?>
            <?php if ($phones) { ?>
                <div class="phones-holder">
                    <?php foreach ($phones as $phone) { ?>
                        <a href="<?= format('phone', $phone['value']); ?>" class="phone h5">
                            <?= $phone['value']; ?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (!empty($socials)): ?>
                <div class="soc-holder">
                    <?php foreach ($socials as $item) { ?>
                        <a href="<?= $item['value']; ?>" class="soc">
                            <?= get_image($item['icon'], [24, 24]); ?>
                        </a>
                    <?php } ?>
                </div>
            <?php endif ?>
        </div>
    </header><!-- #masthead -->
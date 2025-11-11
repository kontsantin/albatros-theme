<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$reviews = get_field('reviews');
$counter = count($reviews);

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$itemBgColor = get_field('item-color');
$reviewTitleColor = get_field('review-title-color');
$reviewTextColor = get_field('review-text-color');

?>
<section id="reviews-block" class="reviews-block reviews <?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($title)): { ?>
            <h2 class="reviews__title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                <?= $title ?>
            </h2>
        <?php }endif ?>
        <div class="reviews-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($reviews as $id => $item): ?>
                    <div class="swiper-slide reviews__swiper-slide">
                        <div class="swipper-slide__inner reviews__item" <?php if($itemBgColor){ ?>style="background-color:<?=$itemBgColor?>;"<?php } ?>>
                            <?php
                                $date = str_replace('/', '.', get_field('date', $item));
                                $gallery = get_field('gallery', $item)
                            ?>
                            <div class="reviews__top">
                                <div class="reviews__top-text">
                                    <h6 class="reviews__top-title" <?php if($reviewTitleColor){ ?>style="color:<?=$reviewTitleColor?>;"<?php } ?>>
                                        <?= $item->post_title ?>
                                    </h6>
                                    <?php if(!empty($date)) { ?>
                                        <p class="p2 reviews__top-date" <?php if($reviewTitleColor){ ?>style="color:<?=$reviewTitleColor?>;"<?php } ?>>
                                            <?= $date ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if(!empty($item->post_content)) { ?>
                                <div class="reviews__content" <?php if($reviewTextColor){ ?>style="color:<?=$reviewTextColor?>;"<?php } ?>>
                                    <?= $item->post_content; ?>
                                </div>
                            <?php } ?>
                            <a class="reviews__btn-more h6">Читать полностью</a>
                            <?php if (!empty($gallery)): { ?>
                                <div class="reviews__gallery">
                                    <?php foreach ($gallery as $item) : ?>
                                        <a data-fancybox="gallery-<?=$id?>" href="<?=$item?>" class="reviews__gallery-item">
                                            <img src="<?=$item?>" alt="img">
                                        </a>
                                    <?php endforeach?>
                                </div>
                            <?php }endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?php if($counter > 2) { ?>
                <div class="reviews__nav">
                    <div class="reviews__btns">
                        <div class="reviews__swiper-button-prev reviews__swiper-button ">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_624_758)">
                                    <path
                                        d="M0.656977 7.39079L7.18578 0.861832C7.34455 0.709355 7.55677 0.625198 7.77689 0.627424C7.99702 0.62965 8.20749 0.718083 8.36315 0.87374C8.51881 1.0294 8.60724 1.23987 8.60946 1.45999C8.61169 1.68012 8.52753 1.89234 8.37506 2.05111L3.28162 7.14535L14.7706 7.14535C14.9916 7.1484 15.2026 7.23835 15.3578 7.39575C15.5131 7.55314 15.6001 7.76532 15.6001 7.98639C15.6001 8.20746 15.5131 8.41964 15.3578 8.57704C15.2026 8.73443 14.9916 8.82438 14.7706 8.82743L3.28162 8.82743L8.3749 13.9214C8.4556 13.9989 8.52003 14.0917 8.56441 14.1944C8.60879 14.2971 8.63223 14.4076 8.63336 14.5195C8.6345 14.6314 8.61329 14.7424 8.571 14.846C8.5287 14.9496 8.46617 15.0437 8.38705 15.1228C8.30793 15.2019 8.21382 15.2644 8.11024 15.3067C8.00665 15.349 7.89566 15.3702 7.78378 15.3691C7.6719 15.368 7.56136 15.3445 7.45865 15.3001C7.35594 15.2558 7.26312 15.1913 7.18562 15.1106L0.656818 8.58151C0.617298 8.54215 0.581938 8.49879 0.551218 8.45239C0.538258 8.43255 0.528818 8.41031 0.517619 8.38999C0.501938 8.36279 0.487858 8.33479 0.475538 8.30599C0.465138 8.27847 0.456498 8.25047 0.449457 8.22183C0.442417 8.19751 0.432658 8.17383 0.427698 8.14871C0.406098 8.03991 0.406098 7.92807 0.427697 7.81943C0.432658 7.79415 0.442417 7.77111 0.449457 7.74663C0.456494 7.71815 0.465203 7.6901 0.475538 7.66263C0.487858 7.63383 0.501938 7.60567 0.517618 7.57847C0.528818 7.55783 0.538258 7.53639 0.551218 7.51607C0.58237 7.47111 0.617728 7.42922 0.656818 7.39095L0.656977 7.39079Z"
                                        fill="#0054F5" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_624_758">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="reviews__swiper-button-next reviews__swiper-button ">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_624_631)">
                                    <path
                                        d="M15.3547 8.60579L8.82594 15.1348C8.66717 15.2872 8.45494 15.3714 8.23482 15.3692C8.0147 15.3669 7.80423 15.2785 7.64857 15.1228C7.49291 14.9672 7.40448 14.7567 7.40225 14.5366C7.40003 14.3165 7.48418 14.1042 7.63666 13.9455L12.7301 8.85123H1.24114C1.02009 8.84818 0.80913 8.75823 0.653892 8.60084C0.498654 8.44344 0.411621 8.23126 0.411621 8.01019C0.411621 7.78912 0.498654 7.57694 0.653892 7.41954C0.80913 7.26215 1.02009 7.1722 1.24114 7.16915H12.7301L7.63682 2.07523C7.55612 1.99773 7.49169 1.90491 7.44731 1.80219C7.40293 1.69948 7.37949 1.58895 7.37835 1.47707C7.37722 1.36518 7.39843 1.2542 7.44072 1.15061C7.48302 1.04702 7.54555 0.952917 7.62467 0.8738C7.70379 0.794682 7.79789 0.732145 7.90148 0.68985C8.00507 0.647555 8.11605 0.626353 8.22794 0.627484C8.33982 0.628616 8.45035 0.652059 8.55307 0.69644C8.65578 0.740821 8.7486 0.805249 8.8261 0.88595L15.3549 7.41507C15.3944 7.45443 15.4298 7.49779 15.4605 7.54419C15.4735 7.56403 15.4829 7.58627 15.4941 7.60659C15.5098 7.63379 15.5239 7.66179 15.5362 7.69059C15.5466 7.71811 15.5552 7.74611 15.5623 7.77475C15.5693 7.79907 15.5791 7.82275 15.584 7.84787C15.6056 7.95667 15.6056 8.06851 15.584 8.17715C15.5791 8.20243 15.5693 8.22547 15.5623 8.24995C15.5552 8.27844 15.5465 8.30649 15.5362 8.33395C15.5239 8.36275 15.5098 8.39091 15.4941 8.41811C15.4829 8.43875 15.4735 8.46019 15.4605 8.48051C15.4293 8.52547 15.394 8.56737 15.3549 8.60563L15.3547 8.60579Z"
                                        fill="#0054F5" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_624_631">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                    </div>
                    <a href="/reviews" class="btn invert">
                        Все отзывы
                    </a>
                </div>
            <?php } ?>
        </div>

    </div>
</section>
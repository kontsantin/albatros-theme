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
            <?php }
            endif ?>
            <?php if (!empty($title)): { ?>
                    <h1 class="hero__title" <?php if ($titleColor) { ?>style="color:<?= $titleColor ?>;" <?php } ?>>
                        <?= $title ?>
                    </h1>
            <?php }
            endif ?>
            <?php if (!empty($list)): {
                    $icon_count = 0;

                    // Сначала считаем количество элементов с иконкой
                    foreach ($list as $item) {
                        if (!empty($item['icon'])) {
                            $icon_count++;
                        }
                    }

                    // Формируем класс списка с количеством иконок
                    $list_classes = 'list list--icons-' . $icon_count;
            ?>

                    <ul class="<?= esc_attr($list_classes) ?>">
                        <?php foreach ($list as $item):
                            $has_icon = !empty($item['icon']);
                            $has_text = !empty($item['text']);
                            if (!$has_icon && !$has_text) continue;

                            $li_classes = 'list__item' . ($has_icon && !$has_text ? ' list__item--icon-only' : '');
                            $icon_classes = 'list__icon' . ($has_icon && !$has_text ? ' list__icon--only' : '');
                        ?>
                            <li class="<?= esc_attr($li_classes) ?>">
                                <?php if ($has_icon): ?>
                                    <div class="<?= esc_attr($icon_classes) ?>"
                                        <?php if ($advantIconColor) { ?>style="background-color:<?= esc_attr($advantIconColor) ?>;" <?php } ?>>
                                        <img src="<?= esc_url($item['icon']) ?>" alt="list_icon">
                                    </div>
                                <?php endif; ?>

                                <?php if ($has_text): ?>
                                    <p class="p1"
                                        <?php if ($advantColor) { ?>style="color:<?= esc_attr($advantColor) ?>;" <?php } ?>>
                                        <?= esc_html($item['text']) ?>
                                    </p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            <?php }
            endif ?>
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
    <?php }
    endif ?>
</div>
<style>
    .list {
  display: grid;
  grid-auto-rows: auto;
  gap: 16px;
  align-items: center;
  justify-items: center;
  list-style: none;
  padding: 0;
  margin: 0;
}

/* первый элемент с текстом занимает всю ширину */
.list__item:first-child {
  grid-column: 1 / -1;
  justify-self: stretch;
}

.list__icon img {
  display: block;
  width: 64px;
  height: 64px;
  object-fit: contain;
}

/* разные сетки по количеству иконок */
.list--icons-1 {
  grid-template-columns: repeat(1, 1fr);
}

.list--icons-2 {
  grid-template-columns: repeat(2, 1fr);
}

.list--icons-3 {
  grid-template-columns: repeat(3, 1fr);
}

.list--icons-4 {
  grid-template-columns: repeat(4, 1fr);
}

/* если иконок больше — можно использовать auto-fit */
.list--icons-5,
.list--icons-6,
.list--icons-7,
.list--icons-8 {
  grid-template-columns: repeat(auto-fit, minmax(64px, 1fr));
}

</style>
<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$descr = get_field('descr');
$list = get_field('list');

?>
<section id="reasons-block" class="reasons <?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <div class="reasons__top">
            <?php if (!empty($title)): { ?>
                <h2 class="reasons__title">
                    <?= $title ?>
                </h2>
            <?php }endif ?>
            <?php if (!empty($descr)): { ?>
                <p class="p1 reasons__descr">
                    <?= $descr ?>
                </p>
            <?php }endif ?>
        </div>
        <?php if (!empty($list)): { ?>
            <ul class="card-list">
                <?php foreach ($list as $id => $item): ?>
                    <div class="card">
                        <div class="card-text">
                            <p class="card-num num">
                                <?= '0' . (strval($id + 1)) ?>
                            </p>
                            <?php if(!empty($item['title'])) { ?>
                                <h6 class="card-title"><?= $item['title'] ?></h6>
                            <?php } ?>
                            <?php if(!empty($item['descr'])) { ?>
                                <h6 class="card-desc"><?= $item['descr'] ?></h6>
                            <?php } ?>
                            <?php if(!empty($item['icon'])) { ?>
                                <div class="card-icon">
                                    <img src="<?= $item['icon'] ?>" alt="icon">
                                </div>
                            <?php } ?>
                        </div>
                        <?php if(!empty($item['bg'])) { ?>
                            <div class="card-bg">
                                <img src="<?= $item['bg'] ?>" alt="card-bg">
                            </div>
                        <?php } ?>
                    </div>
                <?php endforeach ?>
            </ul>
        <?php }endif ?>
    </div>
</section>
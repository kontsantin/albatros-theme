<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');

?>
<section id="-block" class="-block <?= $classes; ?> <?= $align; ?>">
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="__title">
                    <?= $title ?>
                </h2>
            <?php }endif ?>
    </div>
</section>
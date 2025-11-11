<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$blockTitle = get_field('block-title');
$img = wp_get_attachment_image_url(get_field('img'),'full');
$advants = get_field('advants');

$type = get_field('type');
$imgType = get_field('img-type');
$imgHeight = get_field('img-height');
$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$count = get_field('count');
$advantItemColor = get_field('advant-bg-color');
$iconBgColor = get_field('icon-bg-color');
$advantNameColor = get_field('advant-name-color');
$advantDescColor = get_field('advant-desc-color');

// Проверяем наличие изображения
$img_class = empty($img) ? 'no-image' : '';

?>
<div class="advants-block <?=$classes;?> <?=$align;?> <?=$img_class;?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <div class="wrapper <?php if($type === true) { ?>reversed<?php } ?>">
            <div class="advants-left-side">
                <?php if(!empty($blockTitle)) { ?>
                    <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                        <?php echo $blockTitle?>
                    </h2>
                <?php } ?>
                <?php if(!empty($img) && $imgType === true) { ?>
                    <div class="advants-img" <?php if($imgHeight) { ?>style="max-height:<?=$imgHeight?>px"<?php } ?>>
                        <img src="<?=$img?>" alt="">
                    </div>
                <?php } ?>
            </div>
            <?php if(!empty($advants)) { ?>
                <div class="advants <?php if($count === "3") { ?>three<?php } ?>" 
                    <?php if($count){ ?>style="grid-template-columns:repeat(<?=$count?>,1fr);"<?php } ?>
                >
                    <?php foreach($advants as $item) { 
                        $icon = wp_get_attachment_image_url($item['icon'],'full');
                        $title = $item['title'];
                        $desc = $item['desc'];
                    ?>
                        <div class="advant-item" <?php if($advantItemColor){ ?>style="background-color:<?=$advantItemColor?>;"<?php } ?>>
                            <?php if(!empty($icon)) { ?>
                                <div class="advant-icon" <?php if($iconBgColor){ ?>style="background-color:<?=$iconBgColor?>;"<?php } ?>>
                                    <img src="<?=$icon?>" alt="">
                                </div>
                            <?php } ?>
                            <?php if(!empty($title)) { ?>
                                <div class="advant-title" <?php if($advantNameColor){ ?>style="color:<?=$advantNameColor?>;"<?php } ?>>
                                    <?php echo $title?>
                                </div>
                            <?php } ?>
                            <?php if(!empty($desc)) { ?>
                                <div class="advant-desc" <?php if($advantDescColor){ ?>style="color:<?=$advantDescColor?>;"<?php } ?>>
                                    <?php echo $desc?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<style>
    .advants-block.alignwide.no-image .wrapper  {
        flex-direction: column;
    }
    .advants-block.alignwide.no-image .advants-left-side {
        width: fit-content;
    }
    .advants-block.alignwide.no-image .advants {
        grid-template-columns: repeat(3,1fr);
        width: 100%;
    }
     .advants-block.alignwide.no-image .main-title {
        text-align: start;
          font-size: 28px;
    }
</style>
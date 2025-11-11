<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$blockTitle = get_field('block-title');
$img = wp_get_attachment_image_url(get_field('img'),'full');
$steps = get_field('steps');
$formTitle = get_field('form-title');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$count = get_field('count');
$numberBgColor = get_field('number-bg-color');
$numberColor = get_field('number-color');
$itemColor = get_field('item-color');
$stepNameColor = get_field('step-name-color');
$stepDescColor = get_field('step-desc-color');
$formBgColor = get_field('form-bg-color');
$formColor = get_field('form-color');

?>
<?php if(!empty($steps)) { ?>
    <div class="steps-block <?=$classes;?> <?=$align;?>"
        style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
    >
        <div class="container">
            <?php if(!empty($blockTitle)) { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?php echo $blockTitle?>
                </h2>
            <?php } ?>
            <div class="wrapper" <?php if($count){ ?>style="grid-template-columns:repeat(<?=$count?>,1fr);"<?php } ?>>
                <?php if(!empty($img)) { ?>
                    <div class="steps-img"><img src="<?=$img?>" alt=""></div>
                <?php } ?>
                <?php foreach($steps as $i => $item) { 
                    $name = $item['name'];
                    $desc = $item['desc'];
                    $number = ++$i;
                ?>
                    <div class="step-item" <?php if($itemColor){ ?>style="background-color:<?=$itemColor?>;"<?php } ?>>
                        <div class="step-number" style="<?php if($numberBgColor){ ?>background-color:<?=$numberBgColor?>;<?php } ?><?php if($numberColor) { ?>color:<?=$numberColor?><?php } ?>">
                            <?php echo $number?>
                        </div>
                        <?php if(!empty($name)) { ?>
                            <div class="step-name" <?php if($stepNameColor){ ?>style="color:<?=$stepNameColor?>;"<?php } ?>>
                                <?php echo $name?>
                            </div>
                        <?php } ?>
                        <?php if(!empty($desc)) { ?>
                            <div class="step-desc" <?php if($stepDescColor){ ?>style="color:<?=$stepDescColor?>;"<?php } ?>>
                                <?php echo $desc?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if(!empty($formTitle)) { ?>
                    <div class="form-holder open-modal" <?php if($formBgColor){ ?>style="background-color:<?=$formBgColor?>;"<?php } ?> data-modal data-src="#modal-callback">
                        <div class="form-title" <?php if($formColor){ ?>style="color:<?=$formColor?>;"<?php } ?>>
                            <?php echo $formTitle?>
                        </div>
                        <div class="icon">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.3835 16.2859C28.3835 15.8717 28.0477 15.5359 27.6335 15.5359L20.8835 15.5359C20.4693 15.5359 20.1335 15.8717 20.1335 16.2859C20.1335 16.7001 20.4693 17.0359 20.8835 17.0359H26.8835V23.0359C26.8835 23.4501 27.2193 23.7859 27.6335 23.7859C28.0477 23.7859 28.3835 23.4501 28.3835 23.0359L28.3835 16.2859ZM16.8502 28.1299L28.1639 16.8162L27.1032 15.7556L15.7895 27.0693L16.8502 28.1299Z" fill="white" />
                            </svg>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
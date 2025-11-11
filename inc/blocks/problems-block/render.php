<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$title = get_field('title');
$company_name = get_field('company_name');
$company_logo = get_field('company_logo');
$table = get_field('table');

$blockPadd = get_field('block-padd');
$bgColor = get_field('bg-color');
$titleColor = get_field('title-color');
$tableBg = get_field('table-bg-color');
$itemBgColor = get_field('item-bg-color');
$itemColor = get_field('item-color');

?>
<section id="problems-block" class="problems-block problems <?= $classes; ?> <?= $align; ?>"
    style="<?php if($blockPadd){ ?>padding:<?=$blockPadd?>;<?php } ?><?php if($bgColor){ ?>background-color:<?=$bgColor?>;<?php } ?>"
>
    <div class="container">
        <?php if (!empty($title)): { ?>
                <h2 class="main-title" <?php if($titleColor){ ?>style="color:<?=$titleColor?>;"<?php } ?>>
                    <?= $title ?>
                </h2>
            <?php }endif ?>
        <div class="problems__wrapper" <?php if($tableBg){ ?>style="background-color:<?=$tableBg?>;"<?php } ?>>
            <table>
                <thead>
                    <tr>
                        <th width="590" class="h4" style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>">
                            Проблема
                        </th>
                        <th width="415" class="h4" style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>">
                            Другие компании
                        </th>
                        <th width="455" class="h4 problems__company" style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>">
                            <?php if (!empty($company_logo)): { ?>
                                    <div class="company-logo">
                                        <img src="<?= $company_logo ?>" alt="logo">
                                    </div>
                                <?php }endif ?>
                            <div class="company-name h4">
                                <?php if (!empty($company_name)) { ?>
                                    <?= $company_name ?>

                                <?php } else {
                                    echo 'Наша компания';
                                } ?>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($table)): { ?>
                            <?php foreach ($table as $item): ?>
                                <tr>
                                    <td class="p2" 
                                        style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>"><?= $item['first'] ?>
                                    </td>
                                    <td class="p2" 
                                        style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>"><?= $item['second'] ?>
                                    </td>
                                    <td class="p2"
                                        style="<?php if($itemColor){ ?>color:<?=$itemColor?>;<?php } ?><?php if($itemBgColor){ ?>background-color:<?=$itemBgColor?>;<?php } ?>"><?= $item['third'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php }endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$fields = get_fields();

// Use get_field() to safely obtain fields and avoid "undefined index" warnings
$blockTitle  = get_field('block_title');
$items       = get_field('items') ?: array();
$archiveLink = get_field('faq_archive_link');
$bgImageId   = get_field('image-right');
$view_block  = get_field('view_block');

// If there are no items, nothing to render
if (empty($items)) return;
?>
<div class="faq-five-block b-padding <?=$classes;?> <?=$align;?>">
    <div class="container">
        <?php if($blockTitle) { ?>
            <h2 class="faq-five-block__title block-title">
                <?php echo $blockTitle; ?>
            </h2>
        <?php } ?>
        <div class="faq-five-block__items items">
            <div class="items__body">
                <?php
                    if(!empty($items)) {
                    ?>
                        <div class="items__wrapper">
                            <?php
                                foreach($items as $key => $item) { ?>
                                    <div class="items__faq item <?php if($key == 0) echo 'active'; ?>">
                                        <div class="item__header">
                                            <div class="item__title">
                                                <?php echo $item->post_title; ?>
                                            </div>
                                            <div class="item__status">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.24848 11.14L2.45248 5.658C1.88648 5.013 2.34648 4 3.20548 4H12.7975C12.9897 3.99984 13.1779 4.05509 13.3396 4.15914C13.5012 4.26319 13.6295 4.41164 13.7089 4.58669C13.7884 4.76175 13.8157 4.956 13.7876 5.14618C13.7595 5.33636 13.6772 5.51441 13.5505 5.659L8.75448 11.139C8.66061 11.2464 8.54486 11.3325 8.41499 11.3915C8.28511 11.4505 8.14412 11.481 8.00148 11.481C7.85883 11.481 7.71784 11.4505 7.58797 11.3915C7.45809 11.3325 7.34234 11.2464 7.24848 11.139V11.14Z" fill="var(--main-text-primary)"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="item__content" <?php if($key == 0) { ?>style="display:block;"<?php } ?>>
                                            <?php echo apply_filters('the_content', $item->post_content); ?>
                                        </div>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                    <?php
                    }
                
                    if($archiveLink) { ?>
                        <a href="<?php echo $archiveLink; ?>" class="items__archive-btn btn btn--transparent">Все вопросы</a>
                    <?php 
                    }
                ?>
            </div>
            <?php if($bgImageId) { ?>
                <div class="items__image">
                    <?php echo wp_get_attachment_image($bgImageId, 'large'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
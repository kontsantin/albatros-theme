<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

// $title = get_field('title');
$price_lists = get_field('price-lists'); 

?>
<section id="price-lists-block" class="-block <?= $classes; ?> <?= $align; ?>">
    <div class="container">
      <?php if (!empty($price_lists)) { ?>
           <?php foreach ($price_lists as $key_i => $price_list) { ?>
            
                <?php if(!empty($price_list['short_cod_table'])){ ?>
                  <div class="price-list">
                    <?php  echo do_shortcode($price_list['short_cod_table']); ?>
                  </div>
                <?php } ?>
                <?php if(!empty($price_list['sub_title_table'])){  echo "<div class='sub_text'>".$price_list['sub_title_table']."</div>"; } ?>
           <?php } ?>
      <?php } ?>
    </div>
</section>
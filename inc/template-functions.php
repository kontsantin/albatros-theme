<?php

// ================= ACTIONS ====================



// ================= ACTIONS FUNCSTIONS ====================




// ================= ФИЛЬТРЫ ====================




add_filter('excerpt_more', function ($more) {
    return '...';
});
add_filter('excerpt_length', function () {
    return 25;
});

function remove_menu_item_classes($classes, $item, $args, $depth)
{
    // Оставляем только класс `menu-item`
    return ['list__item'];
}
add_filter('nav_menu_css_class', 'remove_menu_item_classes', 10, 4);



// ================ FUNCTIONS ===============


/*--------- Рендеринг хлебных крошек --------*/
function render_breads()
{
    if (function_exists('bcn_display')) { ?>
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php bcn_display(); ?>
        </div>
    <?php }
}


/*-------- ГЕНЕРАЦИЯ ID БЛОКА -----------*/
function blockId($block)
{
    if (!$block) {
        return;
    }
    $blockNum = $block . '-block-0';

    $blockName = $block . '-block';

    if (array_key_exists($blockName, $GLOBALS) && !empty($GLOBALS[$blockName])) {
        $blockNum = $block . '-block-' . count($GLOBALS[$blockName]);
        $GLOBALS[$blockName][] = $blockNum;
    } else {
        $GLOBALS[$blockName][] = $blockNum;
    }

    return $blockNum;
}



/*------- ПОЛУЧЕНИЕ КОНТЕНТА С ОПРЕДЕЛЁННОЙ СТРАНИЦЫ ----------*/

function get_page_content($page_id)
{
    if (!$page_id) {
        return;
    }
    $content = get_the_content('', false, $page_id);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}


/*------- ПОЛУЧЕНИЕ ФОРМЫ ----------*/

function get_form($formname = '', $params = [])
{
    $echo = true;

    if (array_key_exists('echo', $params)) {
        $echo = $params['echo'];
    }

    if (!$formname) {
        if ($echo === true) {
            echo 'Форма не найдена!';
            return '';
        } else {
            return false;
        }
    }

    if ($echo) {
        get_template_part('inc/parts/forms/form', $formname, $params);
    } else {
        ob_start();
        get_template_part('inc/parts/forms/form', $formname, $params);
        $out = ob_get_clean();
        return $out;
    }
}


/*-------- ПЕРЕВОД ПОЛЕЙ ---------*/

if (function_exists('GSE')) {
    GSE()::add_translation('org-name', 'Название организации');
    GSE()::add_translation('contact-person', 'Контактное лицо');
    GSE()::add_translation('phone', 'Телефон');
    GSE()::add_translation('email', 'E-mail');
    GSE()::add_translation('cargo-weight', 'Вес груза (кг)');
    GSE()::add_translation('cargo-dimensions', 'Габариты груза (м³)');
    GSE()::add_translation('route', 'Маршрут');
    GSE()::add_translation('cargo-description', 'Описание груза');
    GSE()::add_translation('calculated_price', 'Расчетная стоимость');
    GSE()::add_translation('privacy_policy', 'Согласие на обработку данных');

    // Если есть дополнительные поля в селектах
    GSE()::add_translation('destination', 'Направление');
    GSE()::add_translation('cargo', 'Тип груза');

    // Текст кнопки и сообщений
    GSE()::add_translation('calculate-btn', 'Рассчитать');
    GSE()::add_translation('submit-btn', 'Отправить');
    GSE()::add_translation('required-field', 'Обязательное поле');
}




// ============== ADD THEME PAGE ===============

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Параметры темы',
        'menu_title' => 'Параметры темы',
        'menu_slug' => 'gs-theme-params',
        'capability' => 'manage_options',
        'parent_slug' => 'themes.php',
        'icon_url' => 'dashicons-location-alt',
        'redirect' => false,
        'autoload' => true,
        'update_button' => 'Обновить',
        'updated_message' => 'Параметры темы обновлены',
    ));
}


function theme($type)
{
    $setting = get_field($type, 'options');
    if ($setting) {
        return $setting;
    } else {
        return '';
    }
}




// =========== РЕГИСТРАЦИЯ БЛОКОВ ===============


add_filter('block_categories_all', 'add_blocks_category', 10);

function add_blocks_category($categories)
{

    $categories[] = array(
        'slug' => 'theme-blocks',
        'title' => 'Блоки темы',
        'icon' => null,
    );

    return $categories;
}

function add_blocks()
{
    $ignore = array('.', '..');
    $bpath = __DIR__ . '/blocks/';
    $blocks = scandir($bpath);

    foreach ($blocks as $folder) {
        if (!in_array($folder, $ignore)) {
            if (file_exists($bpath . $folder . '/index.php')) {
                // $this->blocks[$folder] = require_once $bpath.$folder.'/index.php';
                require_once $bpath . $folder . '/index.php';

            }
        }
    }
}
add_blocks();

function wide_Setup()
{
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'wide_Setup');



add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('reviews')) {
        $query->set('posts_per_page', 9); // Количество отзывов на страницу
    }
});



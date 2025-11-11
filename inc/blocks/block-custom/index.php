<?php
class CustomContentIconsBlock
{
    public function __construct()
    {
        add_action('acf/init', array($this, '_register'));
        add_action('acf/init', array($this,'_init_fields'));
    }

public function _register()
{
    acf_register_block_type(
        array(
            'name'              => 'custom-content-icons',
            'title'             => 'Кастомный: Контент + Иконки',
            'description'       => 'Блок с контентом слева и иконками справа',
            'render_callback'   => array($this, '_render'),
            'category'          => 'theme-blocks',
            'icon'              => 'format-aside',
            'mode'              => 'edit',
            'align'             => 'wide',
            'supports'          => array(
                'align' => array('wide','full'),
                'mode'  => true,
            ),
            'enqueue_assets'    => array($this, '_enqueue_assets'),
            'example'           => array( // ← Добавить этот параметр
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'is_example' => true
                    )
                )
            )
        )
    );
}

    public function _enqueue_assets()
    {
        $tpath = wp_normalize_path(get_template_directory());
        $cpath = wp_normalize_path(__DIR__);
        $path = explode($tpath, $cpath)[1] ?? '';
        
        if (file_exists($cpath . '/block.css')) {
            wp_enqueue_style('theme/custom-content-icons', wp_normalize_path(get_template_directory_uri() . $path . '/block.css'), array(), filemtime($cpath . '/block.css'));
        }
        
        return;
    }

    public function _render($block, $content = '', $is_preview = false)
    {
        $id = $block['id'];
        include 'render.php';
    }

    public function _init_fields()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_custom_content_icons',
                'title' => 'Кастомный блок: Контент + Иконки',
                'fields' => array(
                    array(
                        'key' => 'field_layout_type',
                        'label' => 'Расположение блоков',
                        'name' => 'layout_type',
                        'type' => 'select',
                        'choices' => array(
                            'default' => 'Слева контент, справа иконки',
                            'reversed' => 'Справа контент, слева иконки',
                        ),
                        'default_value' => 'default',
                    ),
                    array(
                        'key' => 'field_block_title',
                        'label' => 'Заголовок блока',
                        'name' => 'block_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_block_text',
                        'label' => 'Текстовое содержание',
                        'name' => 'block_text',
                        'type' => 'wysiwyg',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                    array(
                        'key' => 'field_icons_items',
                        'label' => 'Элементы с иконками',
                        'name' => 'icons_items',
                        'type' => 'repeater',
                        // Показать элементы в виде строк с возможностью сворачивания (аккордеон)
                        'layout' => 'row',
                        // Поле, которое будет отображаться в заголовке свернутого элемента
                        'collapsed' => 'field_icon_title',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_icon',
                                'label' => 'Иконка',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'thumbnail',
                            ),
                            array(
                                'key' => 'field_icon_title',
                                'label' => 'Заголовок иконки',
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_icon_text',
                                'label' => 'Текст иконки',
                                'name' => 'text',
                                'type' => 'textarea',
                                'rows' => 3,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_background_color',
                        'label' => 'Цвет фона',
                        'name' => 'bg_color',
                        'type' => 'color_picker',
                    ),
                    array(
                        'key' => 'field_text_color',
                        'label' => 'Цвет текста',
                        'name' => 'text_color',
                        'type' => 'color_picker',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/custom-content-icons',
                        ),
                    ),
                ),
            ));
        }
    }
}

return new CustomContentIconsBlock();
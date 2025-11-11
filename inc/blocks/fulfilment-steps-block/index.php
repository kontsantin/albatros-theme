<?php
class FulfilmentStepsBlock
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
                'name'              => 'fulfilment-steps',
                'title'             => 'Этапы фулфилмент',
                'description'       => 'Блок: список этапов с изображениями и подписями',
                'render_callback'   => array($this, '_render'),
                'category'          => 'theme-blocks',
                'icon'              => 'schedule',
                'mode'              => 'edit',
                'align'             => 'wide',
                'supports'          => array(
                    'align' => array('wide','full'),
                    'mode'  => true,
                ),
                'enqueue_assets'    => array($this, '_enqueue_assets'),
                'example'           => array(
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
            wp_enqueue_style('theme/fulfilment-steps-block', wp_normalize_path(get_template_directory_uri() . $path . '/block.css'), array(), filemtime($cpath . '/block.css'));
        }
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
                'key' => 'group_fulfilment_steps',
                'title' => 'Блок: Этапы фулфилмент',
                'fields' => array(
                    array(
                        'key' => 'field_fs_title',
                        'label' => 'Заголовок блока',
                        'name' => 'fs_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_fs_title_mode',
                        'label' => 'Режим отображения заголовка',
                        'name' => 'fs_title_mode',
                        'type' => 'radio',
                        'choices' => array(
                            'default' => 'Со стандартными классами (по умолчанию)',
                            'plain' => 'Без классов (дефолтный тег h2)'
                        ),
                        'default_value' => 'default',
                        'layout' => 'vertical',
                    ),
                    // Общие настройки блока: отступы и цвета (как в других блоках)
                    array(
                        'key' => 'field_block_padd',
                        'label' => 'Отступ блока (padding)',
                        'name' => 'block-padd',
                        'type' => 'text',
                        'instructions' => 'Например: 40px 0',
                    ),
                    array(
                        'key' => 'field_bg_color',
                        'label' => 'Цвет фона',
                        'name' => 'bg-color',
                        'type' => 'color_picker',
                    ),
                    array(
                        'key' => 'field_title_color',
                        'label' => 'Цвет заголовка',
                        'name' => 'title-color',
                        'type' => 'color_picker',
                    ),
                    array(
                        'key' => 'field_item_color',
                        'label' => 'Цвет подписи',
                        'name' => 'item-color',
                        'type' => 'color_picker',
                    ),
                    array(
                        'key' => 'field_fs_steps',
                        'label' => 'Этапы',
                        'name' => 'fs_steps',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_fs_step_image',
                                'label' => 'Изображение',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'id',
                                'preview_size' => 'medium',
                            ),
                            array(
                                'key' => 'field_fs_step_caption',
                                'label' => 'Подпись (заголовок снизу)',
                                'name' => 'caption',
                                'type' => 'text',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'block',
                            'operator' => '==',
                            'value' => 'acf/fulfilment-steps',
                        ),
                    ),
                ),
            ));
        }
    }
}

return new FulfilmentStepsBlock();

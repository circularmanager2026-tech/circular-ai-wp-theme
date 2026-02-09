<?php
/**
 * Circular AI Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

function circular_ai_scripts() {
    wp_enqueue_style(
        'circular-ai-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );
    
    wp_enqueue_style(
        'circular-ai-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'circular_ai_scripts');

function circular_ai_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('responsive-embeds');
    add_filter('show_admin_bar', '__return_false');
}
add_action('after_setup_theme', 'circular_ai_setup');

function circular_ai_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // Header
    acf_add_local_field_group([
        'key' => 'group_header_page',
        'title' => 'Header - Logo y Navegación',
        'fields' => [
            [
                'key' => 'field_logo_text_p',
                'label' => 'Logo Text',
                'name' => 'site_logo_text',
                'type' => 'text',
                'default_value' => 'Circular AI',
            ],
            [
                'key' => 'field_login_text_p',
                'label' => 'Login Button Text',
                'name' => 'login_text',
                'type' => 'text',
                'default_value' => 'Iniciar sesión',
            ],
            [
                'key' => 'field_login_url_p',
                'label' => 'Login URL',
                'name' => 'login_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_cta_header_text_p',
                'label' => 'Header CTA Text',
                'name' => 'cta_header_text',
                'type' => 'text',
                'default_value' => 'Comenzar gratis →',
            ],
            [
                'key' => 'field_cta_header_url_p',
                'label' => 'Header CTA URL',
                'name' => 'cta_header_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_nav_items_p',
                'label' => 'Menu Items',
                'name' => 'header_navigation',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_nav_label_p',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_nav_link_p',
                        'label' => 'Link URL',
                        'name' => 'link',
                        'type' => 'url',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'position' => 'acf_after_title',
        'menu_order' => 0,
    ]);
    
    // Hero
    acf_add_local_field_group([
        'key' => 'group_hero_page',
        'title' => 'Hero Section',
        'fields' => [
            [
                'key' => 'field_hero_enable_p',
                'label' => 'Mostrar Hero',
                'name' => 'hero_enable',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ],
            [
                'key' => 'field_hero_title_p',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Crea Chatbots Inteligentes Sin Escribir Código',
            ],
            [
                'key' => 'field_hero_subtitle_p',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Circular AI es tu plataforma para diseñar, entrenar y desplegar chatbots conversacionales.',
            ],
            [
                'key' => 'field_hero_cta_text_p',
                'label' => 'CTA Button Text',
                'name' => 'hero_cta_text',
                'type' => 'text',
                'default_value' => 'Probar gratis →',
            ],
            [
                'key' => 'field_hero_cta_url_p',
                'label' => 'CTA Button URL',
                'name' => 'hero_cta_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_hero_illustration_p',
                'label' => 'Illustración SVG',
                'name' => 'hero_illustration',
                'type' => 'file',
                'instructions' => 'Sube un archivo SVG para la ilustración del hero (persona en sofá)',
                'required' => 0,
                'return_format' => 'url',
                'library' => 'all',
                'mime_types' => 'svg',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'position' => 'normal',
        'menu_order' => 1,
    ]);
    
    // Marquee
    acf_add_local_field_group([
        'key' => 'group_marquee_page',
        'title' => 'Marquee (Texto Deslizante)',
        'fields' => [
            [
                'key' => 'field_marquee_enable_p',
                'label' => 'Mostrar Marquee',
                'name' => 'marquee_enable',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ],
            [
                'key' => 'field_marquee_items_p',
                'label' => 'Items del Marquee',
                'name' => 'marquee_items',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_marquee_icon_p',
                        'label' => 'Icono',
                        'name' => 'icon',
                        'type' => 'text',
                        'default_value' => '✦',
                    ],
                    [
                        'key' => 'field_marquee_text_p',
                        'label' => 'Texto',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'position' => 'normal',
        'menu_order' => 2,
    ]);
    
    // Content Blocks
    acf_add_local_field_group([
        'key' => 'group_content_page',
        'title' => 'Content Blocks (Secciones)',
        'fields' => [
            [
                'key' => 'field_flexible_content_p',
                'label' => 'Agregar Secciones',
                'name' => 'content_blocks',
                'type' => 'flexible_content',
                'button_label' => 'Agregar Sección',
                'layouts' => [
                    'layout_text_image' => [
                        'key' => 'layout_text_image_p',
                        'name' => 'text_image',
                        'label' => 'Texto + Imagen',
                        'sub_fields' => [
                            ['key' => 'field_ti_title_p', 'label' => 'Título', 'name' => 'title', 'type' => 'text'],
                            ['key' => 'field_ti_text_p', 'label' => 'Contenido', 'name' => 'text', 'type' => 'textarea', 'rows' => 4],
                            ['key' => 'field_ti_image_p', 'label' => 'Imagen', 'name' => 'image', 'type' => 'image', 'return_format' => 'url'],
                            ['key' => 'field_ti_pos_p', 'label' => 'Posición Imagen', 'name' => 'image_position', 'type' => 'select', 'choices' => ['left' => 'Izquierda', 'right' => 'Derecha'], 'default_value' => 'right'],
                        ],
                    ],
                    'layout_features' => [
                        'key' => 'layout_features_p',
                        'name' => 'features',
                        'label' => 'Grid de Features',
                        'sub_fields' => [
                            ['key' => 'field_feat_title_p', 'label' => 'Título Sección', 'name' => 'section_title', 'type' => 'text'],
                            ['key' => 'field_feat_items_p', 'label' => 'Features', 'name' => 'features', 'type' => 'repeater', 
                                'sub_fields' => [
                                    ['key' => 'field_feat_icon_p', 'label' => 'Icono', 'name' => 'icon', 'type' => 'text'],
                                    ['key' => 'field_feat_title_item_p', 'label' => 'Título', 'name' => 'title', 'type' => 'text'],
                                    ['key' => 'field_feat_desc_p', 'label' => 'Descripción', 'name' => 'description', 'type' => 'textarea', 'rows' => 2],
                                ]
                            ],
                        ],
                    ],
                    'layout_cta' => [
                        'key' => 'layout_cta_p',
                        'name' => 'cta',
                        'label' => 'Call to Action',
                        'sub_fields' => [
                            ['key' => 'field_cta_title_p', 'label' => 'Título CTA', 'name' => 'title', 'type' => 'text'],
                            ['key' => 'field_cta_text_p', 'label' => 'Texto', 'name' => 'text', 'type' => 'textarea', 'rows' => 3],
                            ['key' => 'field_cta_btn_text_p', 'label' => 'Texto Botón', 'name' => 'button_text', 'type' => 'text'],
                            ['key' => 'field_cta_btn_url_p', 'label' => 'URL Botón', 'name' => 'button_url', 'type' => 'url'],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'position' => 'normal',
        'menu_order' => 3,
    ]);
}
add_action('acf/init', 'circular_ai_register_acf_fields');

function circular_ai_get_field($field_name, $post_id = null, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id);
        return $value !== null && $value !== '' ? $value : $default;
    }
    return $default;
}

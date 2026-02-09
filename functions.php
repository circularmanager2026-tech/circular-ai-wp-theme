<?php
/**
 * Circular AI Theme Functions
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles
 */
function circular_ai_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'circular-ai-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );
    
    // Theme stylesheet
    wp_enqueue_style(
        'circular-ai-style',
        get_stylesheet_uri(),
        [],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'circular_ai_scripts');

/**
 * Theme support
 */
function circular_ai_setup() {
    // Title tag support
    add_theme_support('title-tag');
    
    // Post thumbnails
    add_theme_support('post-thumbnails');
    
    // HTML5 support
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    
    // Responsive embeds
    add_theme_support('responsive-embeds');
    
    // Disable admin bar on frontend
    add_filter('show_admin_bar', '__return_false');
}
add_action('after_setup_theme', 'circular_ai_setup');

/**
 * ACF Options Page (if ACF Pro is active)
 */
function circular_ai_acf_options() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title'    => 'Circular AI Settings',
            'menu_title'    => 'Landing Settings',
            'menu_slug'     => 'circular-ai-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ]);
    }
}
add_action('acf/init', 'circular_ai_acf_options');

/**
 * Register ACF fields programmatically (fallback if JSON doesn't load)
 */
function circular_ai_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // Header Fields
    acf_add_local_field_group([
        'key' => 'group_header',
        'title' => 'Header Settings',
        'fields' => [
            [
                'key' => 'field_logo_text',
                'label' => 'Logo Text',
                'name' => 'site_logo_text',
                'type' => 'text',
                'default_value' => 'Circular AI',
            ],
            [
                'key' => 'field_login_text',
                'label' => 'Login Text',
                'name' => 'login_text',
                'type' => 'text',
                'default_value' => 'Iniciar sesión',
            ],
            [
                'key' => 'field_login_url',
                'label' => 'Login URL',
                'name' => 'login_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_cta_header_text',
                'label' => 'CTA Header Text',
                'name' => 'cta_header_text',
                'type' => 'text',
                'default_value' => 'Comenzar gratis →',
            ],
            [
                'key' => 'field_cta_header_url',
                'label' => 'CTA Header URL',
                'name' => 'cta_header_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_nav_items',
                'label' => 'Navigation Items',
                'name' => 'header_navigation',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_nav_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_nav_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'circular-ai-settings',
                ],
            ],
        ],
    ]);
    
    // Hero Fields
    acf_add_local_field_group([
        'key' => 'group_hero',
        'title' => 'Hero Settings',
        'fields' => [
            [
                'key' => 'field_hero_title',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Crea Chatbots Inteligentes Sin Escribir Código',
            ],
            [
                'key' => 'field_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Circular AI es tu plataforma para diseñar, entrenar y desplegar chatbots conversacionales que transforman la experiencia de tus clientes.',
            ],
            [
                'key' => 'field_hero_cta_text',
                'label' => 'CTA Text',
                'name' => 'hero_cta_text',
                'type' => 'text',
                'default_value' => 'Probar gratis →',
            ],
            [
                'key' => 'field_hero_cta_url',
                'label' => 'CTA URL',
                'name' => 'hero_cta_url',
                'type' => 'url',
                'default_value' => '#',
            ],
            [
                'key' => 'field_hero_notifications',
                'label' => 'Floating Notifications',
                'name' => 'hero_notifications',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_notif_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_notif_time',
                        'label' => 'Time',
                        'name' => 'time',
                        'type' => 'text',
                        'default_value' => 'Ahora',
                    ],
                    [
                        'key' => 'field_notif_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_notif_count',
                        'label' => 'Count Text',
                        'name' => 'count',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'circular-ai-settings',
                ],
            ],
        ],
    ]);
    
    // Marquee Fields
    acf_add_local_field_group([
        'key' => 'group_marquee',
        'title' => 'Marquee Settings',
        'fields' => [
            [
                'key' => 'field_marquee_items',
                'label' => 'Marquee Items',
                'name' => 'marquee_items',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'key' => 'field_marquee_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'text',
                        'default_value' => '✦',
                    ],
                    [
                        'key' => 'field_marquee_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'text',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'circular-ai-settings',
                ],
            ],
        ],
    ]);
}
add_action('acf/init', 'circular_ai_register_acf_fields');

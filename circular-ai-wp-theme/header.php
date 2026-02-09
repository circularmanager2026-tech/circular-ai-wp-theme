<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); 
    
    // Get current page ID for page-specific fields
    $page_id = is_page() ? get_the_ID() : null;
    ?>
    
    <header class="site-header">
        <a href="<?php echo home_url(); ?>" class="logo">
            <div class="logo-icon"></div>
            <?php echo circular_ai_get_field('site_logo_text', $page_id, 'Circular AI'); ?>
        </a>
        
        <nav class="main-nav">
            <?php 
            $nav_items = circular_ai_get_field('header_navigation', $page_id);
            if ($nav_items) :
                foreach ($nav_items as $item) : 
            ?>
                <a href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['label']); ?></a>
            <?php 
                endforeach;
            else : 
            ?>
                <a href="#features"><?php _e('Características', 'circular-ai'); ?></a>
                <a href="#pricing"><?php _e('Precios', 'circular-ai'); ?></a>
                <a href="#contact"><?php _e('Contacto', 'circular-ai'); ?></a>
            <?php endif; ?>
        </nav>
        
        <div class="header-actions">
            <a href="<?php echo esc_url(circular_ai_get_field('login_url', $page_id, '#')); ?>" class="login-link">
                <?php echo circular_ai_get_field('login_text', $page_id, __('Iniciar sesión', 'circular-ai')); ?>
            </a>
            <a href="<?php echo esc_url(circular_ai_get_field('cta_header_url', $page_id, '#')); ?>" class="btn-primary">
                <?php echo circular_ai_get_field('cta_header_text', $page_id, __('Comenzar gratis →', 'circular-ai')); ?>
            </a>
        </div>
    </header>

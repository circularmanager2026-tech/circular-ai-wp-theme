<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="site-header">
        <a href="<?php echo home_url(); ?>" class="logo">
            <div class="logo-icon"></div>
            <?php echo get_field('site_logo_text') ?: 'Circular AI'; ?>
        </a>
        
        <nav class="main-nav">
            <?php 
            $nav_items = get_field('header_navigation');
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
            <a href="<?php echo esc_url(get_field('login_url') ?: '#'); ?>" class="login-link">
                <?php echo get_field('login_text') ?: _e('Iniciar sesión', 'circular-ai'); ?>
            </a>
            <a href="<?php echo esc_url(get_field('cta_header_url') ?: '#'); ?>" class="btn-primary">
                <?php echo get_field('cta_header_text') ?: _e('Comenzar gratis →', 'circular-ai'); ?>
            </a>
        </div>
    </header>

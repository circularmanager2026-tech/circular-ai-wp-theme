<?php get_header(); 
$page_id = get_the_ID();

// Notificaciones flotantes ESTÁTICAS (no administrables)
$static_notifications = [
    [
        'label' => 'NUEVO MENSAJE',
        'time' => 'AHORA',
        'title' => '"¿Tienen disponibilidad pa..."',
        'count' => '42+ mensajes nuevos',
        'class' => 'notif-1'
    ],
    [
        'label' => 'LEAD CALIFICADO',
        'time' => 'AHORA',
        'title' => 'Cliente interesado en Pro...',
        'count' => '8+ leads hoy',
        'class' => 'notif-2'
    ],
    [
        'label' => 'CITA AGENDADA',
        'time' => 'AHORA',
        'title' => 'Confirmado: Demo el martes...',
        'count' => '5+ reuniones esta semana',
        'class' => 'notif-3'
    ],
];
?-->

<?php if (is_page()) : ?>

    <?php if (circular_ai_get_field('marquee_enable', $page_id, true)) : ?>
    <div class="marquee-container">
        <div class="marquee">
            <?php 
            $marquee_items = circular_ai_get_field('marquee_items', $page_id);
            $items = $marquee_items ?: [
                ['icon' => '✦', 'text' => 'Chatbots personalizados para tu negocio'],
                ['icon' => '✦', 'text' => 'Integración con WhatsApp, Telegram y web'],
                ['icon' => '✦', 'text' => 'IA entrenada con tus datos'],
                ['icon' => '✦', 'text' => 'Soporte técnico 24/7'],
                ['icon' => '✦', 'text' => 'Sin conocimientos de programación'],
            ];
            ?>
            <div class="marquee-content">
                <?php foreach ($items as $item) : ?>
                    <span class="marquee-item"><?php echo esc_html($item['icon'] ?: '✦'); ?> <?php echo esc_html($item['text']); ?></span>
                <?php endforeach; ?>
            </div>
            <div class="marquee-content" aria-hidden="true">
                <?php foreach ($items as $item) : ?>
                    <span class="marquee-item"><?php echo esc_html($item['icon'] ?: '✦'); ?> <?php echo esc_html($item['text']); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (circular_ai_get_field('hero_enable', $page_id, true)) : ?>
    <section class="hero">
        <div class="hero-left">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo nl2br(esc_html(circular_ai_get_field('hero_title', $page_id, 'Crea Chatbots Inteligentes Sin Escribir Código'))); ?></h1>
                
                <p class="hero-subtitle">
                    <?php echo nl2br(esc_html(circular_ai_get_field('hero_subtitle', $page_id, 'Circular AI es tu plataforma para diseñar, entrenar y desplegar chatbots conversacionales que transforman la experiencia de tus clientes.'))); ?>
                </p>
                
                <a href="<?php echo esc_url(circular_ai_get_field('hero_cta_url', $page_id, '#')); ?>" class="btn-hero">
                    <?php echo esc_html(circular_ai_get_field('hero_cta_text', $page_id, 'Probar gratis →')); ?>
                </a>
            </div>
        </div>
        
        <div class="hero-right">
            <!-- Notificaciones ESTÁTICAS -->
            <?php foreach ($static_notifications as $notif) : ?>
            <div class="notification <?php echo $notif['class']; ?>">
                <div class="notification-header">
                    <span><span class="notification-dot"></span><?php echo esc_html($notif['label']); ?></span>
                    <span><?php echo esc_html($notif['time']); ?></span>
                </div>
                <div class="notification-title"><?php echo esc_html($notif['title']); ?></div>
                <div class="notification-count"><?php echo esc_html($notif['count']); ?></div>
            </div>
            <?php endforeach; ?>
            
            <!-- Ilustración SVG -->
            <div class="illustration">
                <?php 
                $svg_url = circular_ai_get_field('hero_illustration', $page_id);
                if ($svg_url) :
                    $svg_content = @file_get_contents($svg_url);
                    if ($svg_content) {
                        echo $svg_content;
                    } else {
                        echo '<img src="' . esc_url($svg_url) . '" alt="Illustration" class="hero-illustration" />';
                    }
                else :
                ?>
                <svg viewBox="0 0 500 450" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M80 320 Q80 280 120 280 L380 280 Q420 280 420 320 L420 380 Q420 400 400 400 L100 400 Q80 400 80 380 Z" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                    <line x1="100" y1="400" x2="100" y2="440" stroke="#0f0f23" stroke-width="3"/>
                    <line x1="400" y1="400" x2="400" y2="440" stroke="#0f0f23" stroke-width="3"/>
                    <ellipse cx="240" cy="250" rx="35" ry="40" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                    <circle cx="230" cy="255" r="3" fill="#0f0f23"/>
                    <circle cx="250" cy="255" r="3" fill="#0f0f23"/>
                    <path d="M235 270 Q240 275 245 270" fill="none" stroke="#0f0f23" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

<?php else : ?>

    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        <?php endwhile; endif; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>

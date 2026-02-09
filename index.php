<?php get_header(); ?>

<section class="hero">
    <div class="hero-left">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo get_field('hero_title') ?: 'Crea Chatbots Inteligentes Sin Escribir Código'; ?></h1>
            
            <p class="hero-subtitle">
                <?php echo get_field('hero_subtitle') ?: 'Circular AI es tu plataforma para diseñar, entrenar y desplegar chatbots conversacionales que transforman la experiencia de tus clientes.'; ?>
            </p>
            
            <a href="<?php echo esc_url(get_field('hero_cta_url') ?: '#'); ?>" class="btn-hero">
                <?php echo get_field('hero_cta_text') ?: 'Probar gratis →'; ?>
            </a>
        </div>
    </div>
    
    <div class="hero-right">
        <?php
        // Notificaciones flotantes
        $notifications = get_field('hero_notifications');
        if ($notifications) :
            $notif_class = ['notif-1', 'notif-2', 'notif-3'];
            $i = 0;
            foreach ($notifications as $notif) :
        ?>
            <div class="notification <?php echo $notif_class[$i % 3]; ?>">
                <div class="notification-header">
                    <span><span class="notification-dot"></span><?php echo esc_html($notif['label']); ?></span>
                    <span><?php echo esc_html($notif['time']); ?></span>
                </div>
                <div class="notification-title"><?php echo esc_html($notif['title']); ?></div>
                <div class="notification-count"><?php echo esc_html($notif['count']); ?></div>
            </div>
        <?php
                $i++;
            endforeach;
        else :
        ?>
            <!-- Notificaciones por defecto -->
            <div class="notification notif-1">
                <div class="notification-header">
                    <span><span class="notification-dot"></span>NUEVO MENSAJE</span>
                    <span>Ahora</span>
                </div>
                <div class="notification-title">"¿Tienen disponibilidad pa..."</div>
                <div class="notification-count">42+ mensajes nuevos</div>
            </div>
            
            <div class="notification notif-2">
                <div class="notification-header">
                    <span><span class="notification-dot"></span>LEAD CALIFICADO</span>
                    <span>Ahora</span>
                </div>
                <div class="notification-title">Cliente interesado en Pro...</div>
                <div class="notification-count">8+ leads hoy</div>
            </div>
            
            <div class="notification notif-3">
                <div class="notification-header">
                    <span><span class="notification-dot"></span>CITA AGENDADA</span>
                    <span>Ahora</span>
                </div>
                <div class="notification-title">Confirmado: Demo el martes...</div>
                <div class="notification-count">5+ reuniones esta semana</div>
            </div>
        <?php endif; ?>
        
        <!-- Ilustración SVG -->
        <div class="illustration">
            <svg viewBox="0 0 500 450" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Sofa -->
                <path d="M80 320 Q80 280 120 280 L380 280 Q420 280 420 320 L420 380 Q420 400 400 400 L100 400 Q80 400 80 380 Z" 
                      fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                <path d="M80 320 L80 360 Q80 380 100 380 L130 380" 
                      fill="none" stroke="#0f0f23" stroke-width="3"/>
                <path d="M420 320 L420 360 Q420 380 400 380 L370 380" 
                      fill="none" stroke="#0f0f23" stroke-width="3"/>
                
                <!-- Sofa legs -->
                <line x1="100" y1="400" x2="100" y2="440" stroke="#0f0f23" stroke-width="3"/>
                <line x1="400" y1="400" x2="400" y2="440" stroke="#0f0f23" stroke-width="3"/>
                
                <!-- Person body -->
                <path d="M220 290 Q200 300 180 340 L160 420 L200 420 L215 360 L235 420 L275 420 L260 340 Q280 300 260 290" 
                      fill="#0f0f23" stroke="#0f0f23" stroke-width="2"/>
                
                <!-- Person head -->
                <ellipse cx="240" cy="250" rx="35" ry="40" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                
                <!-- Hair/Headset -->
                <path d="M205 240 Q205 200 240 200 Q275 200 275 240" 
                      fill="none" stroke="#0f0f23" stroke-width="3"/>
                <rect x="200" y="235" width="12" height="25" rx="3" fill="#0f0f23"/>
                <rect x="268" y="235" width="12" height="25" rx="3" fill="#0f0f23"/>
                <path d="M208 247 Q240 270 272 247" fill="none" stroke="#0f0f23" stroke-width="2"/>
                
                <!-- Eyes -->
                <circle cx="230" cy="255" r="3" fill="#0f0f23"/>
                <circle cx="250" cy="255" r="3" fill="#0f0f23"/>
                
                <!-- Smile -->
                <path d="M235 270 Q240 275 245 270" fill="none" stroke="#0f0f23" stroke-width="2" stroke-linecap="round"/>
                
                <!-- Arms holding tablet -->
                <path d="M200 330 Q180 350 190 370" fill="none" stroke="#0f0f23" stroke-width="3" stroke-linecap="round"/>
                <path d="M280 330 Q300 350 290 370" fill="none" stroke="#0f0f23" stroke-width="3" stroke-linecap="round"/>
                
                <!-- Tablet -->
                <rect x="210" y="350" width="60" height="45" rx="5" fill="#fff" stroke="#0f0f23" stroke-width="2"/>
                <line x1="220" y1="365" x2="260" y2="365" stroke="#0f0f23" stroke-width="2"/>
                <line x1="220" y1="375" x2="250" y2="375" stroke="#0f0f23" stroke-width="2"/>
                
                <!-- Dog -->
                <ellipse cx="150" cy="390" rx="40" ry="25" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                <circle cx="125" cy="380" r="18" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                <ellipse cx="118" cy="378" rx="3" ry="4" fill="#0f0f23"/>
                <ellipse cx="132" cy="378" rx="3" ry="4" fill="#0f0f23"/>
                <ellipse cx="125" cy="388" rx="4" ry="3" fill="#0f0f23"/>
                <path d="M108 370 Q100 360 105 355" fill="none" stroke="#0f0f23" stroke-width="2"/>
                <path d="M142 370 Q150 360 145 355" fill="none" stroke="#0f0f23" stroke-width="2"/>
                <path d="M110 395 Q115 405 125 405" fill="none" stroke="#0f0f23" stroke-width="2"/>
                <ellipse cx="140" cy="400" rx="5" ry="3" fill="#0f0f23"/>
                <ellipse cx="170" cy="400" rx="5" ry="3" fill="#0f0f23"/>
                
                <!-- Side table -->
                <line x1="420" y1="380" x2="420" y2="440" stroke="#0f0f23" stroke-width="3"/>
                <line x1="460" y1="380" x2="460" y2="440" stroke="#0f0f23" stroke-width="3"/>
                <ellipse cx="440" cy="380" rx="30" ry="10" fill="#fff" stroke="#0f0f23" stroke-width="3"/>
                
                <!-- Coffee cup -->
                <path d="M430 365 L430 375 Q430 380 435 380 L445 380 Q450 380 450 375 L450 365" 
                      fill="#fff" stroke="#0f0f23" stroke-width="2"/>
                <path d="M450 368 Q455 368 455 373 Q455 377 450 377" fill="none" stroke="#0f0f23" stroke-width="2"/>
                <path d="M435 360 Q438 355 442 360" fill="none" stroke="#0f0f23" stroke-width="1.5"/>
            </svg>
        </div>
    </div>
</section>

<?php get_footer(); ?>

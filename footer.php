    <?php 
    // Marquee Section
    $marquee_items = get_field('marquee_items');
    if ($marquee_items || have_rows('marquee_items')) : 
    ?>
    <div class="marquee">
        <div class="marquee-content">
            <?php 
            // Primera copia
            if (have_rows('marquee_items')) :
                while (have_rows('marquee_items')) : the_row(); 
            ?>
                <div class="marquee-item">
                    <span class="marquee-icon"><?php echo get_sub_field('icon') ?: '✦'; ?></span>
                    <?php echo esc_html(get_sub_field('text')); ?>
                </div>
            <?php 
                endwhile;
            endif;
            
            // Duplicar para loop infinito
            if (have_rows('marquee_items')) :
                while (have_rows('marquee_items')) : the_row(); 
            ?>
                <div class="marquee-item">
                    <span class="marquee-icon"><?php echo get_sub_field('icon') ?: '✦'; ?></span>
                    <?php echo esc_html(get_sub_field('text')); ?>
                </div>
            <?php 
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>

</main>

<footer class="">
  <div class="">
    <div class="">
      <div class="">
        <h3 class=""><?php bloginfo('name'); ?></h3>
        <p><?php bloginfo('description'); ?></p>
      </div>
      <div class="">
        <h3 class=""><?php esc_html_e('Quick Links', 'wp-starter-theme'); ?></h3>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => false,
          'menu_class' => '',
          'fallback_cb' => false,
        ));
        ?>
      </div>
      <div class="">
        <h3 class=""><?php esc_html_e('Contact Us', 'wp-starter-theme'); ?></h3>
        <p><?php esc_html_e('Email: info@example.com', 'wp-starter-theme'); ?></p>
        <p><?php esc_html_e('Phone: (123) 456-7890', 'wp-starter-theme'); ?></p>
      </div>
    </div>
    <div class="">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'wp-starter-theme'); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
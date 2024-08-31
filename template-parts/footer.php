</main>

<footer class="bg-gray-800 text-white py-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-between">
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h3 class="text-xl font-bold mb-2"><?php bloginfo('name'); ?></h3>
        <p><?php bloginfo('description'); ?></p>
      </div>
      <div class="w-full md:w-1/3 mb-6 md:mb-0">
        <h3 class="text-xl font-bold mb-2"><?php esc_html_e('Quick Links', 'wp-starter-theme'); ?></h3>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => false,
          'menu_class' => 'list-none',
          'fallback_cb' => false,
        ));
        ?>
      </div>
      <div class="w-full md:w-1/3">
        <h3 class="text-xl font-bold mb-2"><?php esc_html_e('Contact Us', 'wp-starter-theme'); ?></h3>
        <p><?php esc_html_e('Email: info@example.com', 'wp-starter-theme'); ?></p>
        <p><?php esc_html_e('Phone: (123) 456-7890', 'wp-starter-theme'); ?></p>
      </div>
    </div>
    <div class="mt-8 text-center">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'wp-starter-theme'); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <div class="text-center">
    <h1 class="text-4xl font-bold mb-4"><?php esc_html_e('404 - Page Not Found', 'wp-starter-theme'); ?></h1>
    <p class="text-xl mb-8"><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'wp-starter-theme'); ?></p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
      <?php esc_html_e('Go to Homepage', 'wp-starter-theme'); ?>
    </a>
  </div>
</div>

<?php
get_footer();
?>
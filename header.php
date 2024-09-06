<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="dd-header bg-pink-200 border-b border-pink-600 px-6 flex justify-between h-12 items-center">
    <div class="dd-branding">
      <?php
      if (function_exists('the_custom_logo')) {
        the_custom_logo();
      }
      ?>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl/none font-semibold">
        <?php bloginfo('name'); ?>
      </a>
    </div>

    <nav class="dd-primary-nav flex gap-4 items-center [&_.current-menu-item>a]:font-bold">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'contents',
        'fallback_cb' => false,
      ));
      ?>
    </nav>
  </header>

  <main>
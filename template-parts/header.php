<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="bg-white shadow-md" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center">
        <?php
        if (function_exists('the_custom_logo')) {
          the_custom_logo();
        }
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold text-gray-800 ml-2">
          <?php bloginfo('name'); ?>
        </a>
      </div>

      <nav class="hidden md:flex space-x-4">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'flex space-x-4',
          'fallback_cb' => false,
        ));
        ?>
      </nav>

      <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <nav x-show="mobileMenuOpen" class="md:hidden bg-white border-t border-gray-200">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'flex flex-col space-y-2 p-4',
        'fallback_cb' => false,
      ));
      ?>
    </nav>
  </header>

  <main>
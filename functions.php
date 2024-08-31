<?php

/**
 * WordPress Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress_Starter_Theme
 *
 * @copyright 2023 Bits & Letters, LLC
 * This file is proprietary software owned by Bits & Letters, LLC.
 * No part of this software, including this file, may be copied, modified,
 * propagated, or distributed except as expressly permitted by Bits & Letters, LLC.
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Disable comments and other UGC features
require_once get_template_directory() . '/inc/disable-comments.php';

// Enqueue scripts and styles
require_once get_template_directory() . '/inc/enqueue-scripts.php';

// Theme setup
function wp_starter_theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('wp-block-styles');
  add_theme_support('align-wide');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'wp-starter-theme'),
  ));
}
add_action('after_setup_theme', 'wp_starter_theme_setup');

// Wrap WordPress styles in wp-base layer
function wp_starter_theme_wrap_styles_in_layers($html, $handle)
{
  if ($handle === 'wp-block-library' || $handle === 'global-styles') {
    $html = str_replace('<style', '<style>@layer wp-base {', $html);
    $html = str_replace('</style>', '}</style>', $html);
  }
  return $html;
}
add_filter('style_loader_tag', 'wp_starter_theme_wrap_styles_in_layers', 10, 2);

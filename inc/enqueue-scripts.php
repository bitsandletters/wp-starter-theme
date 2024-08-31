<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function wp_starter_theme_asset_path($filename)
{
  $dist_path = get_template_directory_uri() . '/dist/';
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . '/dist/manifest.json';
    $manifest = file_exists($manifest_path)
      ? json_decode(file_get_contents($manifest_path), true)
      : [];
  }

  if (array_key_exists($filename, $manifest)) {
    return $dist_path . $manifest[$filename];
  }

  return $dist_path . $directory . $file;
}

function wp_starter_theme_enqueue_scripts()
{
  $is_local = wp_get_environment_type() === 'local';
  $vite_dev_server = 'http://localhost:3000';

  if ($is_local && @file_get_contents($vite_dev_server)) {
    // Vite development server is running
    wp_enqueue_script('wp-starter-theme-js', $vite_dev_server . '/assets/js/main.js', array(), null, true);
    wp_enqueue_style('wp-starter-theme-css', $vite_dev_server . '/assets/css/main.css');
  } else {
    // Production or Vite development server not running
    wp_enqueue_script('wp-starter-theme-js', wp_starter_theme_asset_path('assets/js/main.js'), array(), null, true);
    wp_enqueue_style('wp-starter-theme-css', wp_starter_theme_asset_path('assets/css/main.css'));
  }

  // Enqueue Alpine.js
  wp_enqueue_script('alpine', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js', array(), '2.8.2', true);

  // Enqueue comment-reply script if needed
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'wp_starter_theme_enqueue_scripts');

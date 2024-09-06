<?php

require_once("inc/vite-support.php");
// require_once("inc/admin-bar-css.php");
// require_once("inc/custom-menus.php");

add_action("after_setup_theme", function () {
  add_theme_support("title-tag");
  add_theme_support("align-wide");
  add_theme_support("responsive-embeds");
  add_theme_support("post-thumbnails");
  add_theme_support("html5", ["caption", "comment-form", "comment-list", "gallery", "search-form", "script", "style"]);
  add_theme_support("automatic-feed-links");
  add_theme_support("post-formats", ["aside", "image", "link", "quote", "status"]);
  add_theme_support("customize-selective-refresh-widgets");
  add_theme_support("custom-logo");
  add_theme_support("custom-background");
  add_theme_support("custom-header");

  add_image_size("opengraph", 1200, 630, true);

  register_nav_menus([
    "primary" => "Main Menu",
    "social" => "Social Menu",
    "footer" => "Footer Menu",
  ]);
});

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('boomer-wp-css', get_stylesheet_uri(), false);

  // Wrap global styles in wordpress cascade layer
  $styles = wp_styles();
  $styles->registered['global-styles']->extra['after'] = array_merge(['@layer wordpress {'], $styles->registered['global-styles']->extra['after'], ['}']);
});

function dd_post_excerpt($classString = '')
{
  if (!has_excerpt()) return "";

  printf('<p class="%s">%s</p>', $classString, get_the_excerpt());
}

function dd_post_dateline()
{
  printf(
    '<time datetime="%s">%s</time>',
    get_the_date('Y-m-d'),
    get_the_date('F j, Y')
  );
}

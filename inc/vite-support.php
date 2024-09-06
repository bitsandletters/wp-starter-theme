<?php

// Add my footer scripts ahead of any other footer items
add_action('wp_footer', 'vite_footer_assets');

function vite_footer_assets()
{

  if (vite_should_use_dev_server()) {
    print("<!-- VITE DEVELOPMENT TAGS -->\n");
    printf('<script type="module" src="%s@vite/client"></script>', vite_dev_url_base());
    printf('<script type="module" src="%s"></script>', vite_dev_url_base() . vite_entry_point());
  } else {
    print("<!-- VITE PRODUCTION TAGS -->\n");

    $chunkInfo = vite_get_chunk(vite_entry_point());
    printf('<script type="module" src="%s"></script>', vite_built_asset_url($chunkInfo->file));

    print("\n");
  }
}

add_action("wp_enqueue_scripts", "vite_enqueue_assets", 200);

function vite_enqueue_assets()
{
  if (!vite_should_use_dev_server()) {
    $chunkInfo = vite_get_chunk(vite_entry_point());
    if (property_exists($chunkInfo, "css")) {
      foreach ($chunkInfo->css as $cssAsset) {
        wp_enqueue_style("vite-frontend-css-" . $cssAsset, vite_built_asset_url($cssAsset), [], null);
      }
    }
    if (property_exists($chunkInfo, "imports")) {
      foreach ($chunkInfo->imports as $import) {
        $importChunkInfo = vite_get_chunk($import);
        printf(
          '<link rel="modulepreload" href="%s" data-asset="%s" />',
          vite_built_asset_url($importChunkInfo->file),
          $import
        );
      }
    }
  }
}



function vite_dev_url_base()
{
  $current_env = "http://localhost:5173/";

  // Check if the constant has been defined
  if (defined('VITE_DEV_URL_BASE')) {
    $current_env = constant('VITE_DEV_URL_BASE');
  }
  // Check if the environment variable has been set, if `getenv` is available on the system
  elseif (function_exists('getenv')) {
    $has_env = getenv('VITE_DEV_URL_BASE');
    if (false !== $has_env) {
      $current_env = $has_env;
    }
  }

  return $current_env;
}

function vite_entry_point()
{
  return "assets/js/main.ts";
}

function vite_asset_url($file)
{
  return (get_stylesheet_directory_uri() . "/dist/" . $file);
}

function vite_get_manifest_path()
{
  return get_stylesheet_directory() . "/dist/.vite/manifest.json";
}

function vite_get_manifest()
{
  $manifestPath = vite_get_manifest_path();
  return json_decode(file_get_contents($manifestPath));
}

function vite_get_chunk($path)
{
  $manifest = vite_get_manifest();
  return property_exists($manifest, $path) ? $manifest->$path : null;
}

function vite_built_asset_url($path)
{
  return (get_stylesheet_directory_uri() . "/dist/" . $path);
}

function is_vite_dev_server_running()
{
  $handle = curl_init(vite_dev_url_base());
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_NOBODY, true);
  curl_exec($handle);
  $error = curl_errno($handle);
  curl_close($handle);
  return !$error;
}

function vite_is_dev_environment()
{
  return in_array(wp_get_environment_type(), ["local", "development"]);
}

function vite_should_use_dev_server()
{
  $isDevEnvironment = vite_is_dev_environment() && is_vite_dev_server_running();
  return $isDevEnvironment;
}

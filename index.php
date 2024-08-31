<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
  ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>
        <h2 class="text-2xl font-bold mb-2">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="text-gray-600 mb-4">
          <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline">Read more</a>
      </article>
    <?php
    endwhile;

    the_posts_navigation();
  else :
    ?>
    <p><?php esc_html_e('No posts found.', 'wp-starter-theme'); ?></p>
  <?php
  endif;
  ?>
</div>

<?php
get_footer();
?>
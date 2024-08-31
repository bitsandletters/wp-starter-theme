<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
      <div class="text-gray-600 mb-4">
        <?php
        printf(
          esc_html__('Posted on %s', 'wp-starter-theme'),
          get_the_date()
        );
        ?>
      </div>
      <div class="prose max-w-none">
        <?php the_content(); ?>
      </div>
    </article>
  <?php
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;
  endwhile;
  ?>
</div>

<?php
get_footer();
?>
<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <?php
  while (have_posts()) :
    the_post();
  ?>
    <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
      <div class="prose max-w-none">
        <?php the_content(); ?>
      </div>
    </article>
  <?php
  endwhile;
  ?>
</div>

<?php
get_footer();
?>
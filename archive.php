<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <header class="mb-8">
    <h1 class="text-3xl font-bold">
      <?php
      if (is_category()) :
        single_cat_title();
      elseif (is_tag()) :
        single_tag_title();
      elseif (is_author()) :
        the_post();
        printf(esc_html__('Author: %s', 'wp-starter-theme'), get_the_author());
        rewind_posts();
      elseif (is_day()) :
        printf(esc_html__('Day: %s', 'wp-starter-theme'), get_the_date());
      elseif (is_month()) :
        printf(esc_html__('Month: %s', 'wp-starter-theme'), get_the_date(_x('F Y', 'monthly archives date format', 'wp-starter-theme')));
      elseif (is_year()) :
        printf(esc_html__('Year: %s', 'wp-starter-theme'), get_the_date(_x('Y', 'yearly archives date format', 'wp-starter-theme')));
      else :
        esc_html_e('Archives', 'wp-starter-theme');
      endif;
      ?>
    </h1>
  </header>

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
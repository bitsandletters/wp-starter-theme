<?php
get_header();
?>

<div class="revert-layer">
  <h1 class="wp-block-post-title"><?php bloginfo('name'); ?></h1>

  <?php if (have_posts()) : ?>
    <div class="">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div class="">
              <?php the_post_thumbnail('large', ['class' => '']); ?>
            </div>
          <?php endif; ?>
          <div class="">
            <h2 class="">
              <a href="<?php the_permalink(); ?>" class="">
                <?php the_title(); ?>
              </a>
            </h2>
            <div class="">
              <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="">
              <?php esc_html_e('Read More', 'wp-starter-theme'); ?>
            </a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <div class="">
      <?php the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' => __('Previous', 'wp-starter-theme'),
        'next_text' => __('Next', 'wp-starter-theme'),
      )); ?>
    </div>

  <?php else : ?>
    <p><?php esc_html_e('No posts found.', 'wp-starter-theme'); ?></p>
  <?php endif; ?>
</div>

<?php
get_footer();
?>
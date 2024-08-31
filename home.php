<?php
get_header();
?>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-4xl font-bold mb-8"><?php bloginfo('name'); ?></h1>

  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white shadow-md rounded-lg overflow-hidden'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div class="aspect-w-16 aspect-h-9">
              <?php the_post_thumbnail('large', ['class' => 'object-cover w-full h-full']); ?>
            </div>
          <?php endif; ?>
          <div class="p-6">
            <h2 class="text-2xl font-bold mb-2">
              <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-primary">
                <?php the_title(); ?>
              </a>
            </h2>
            <div class="text-gray-600 mb-4">
              <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition duration-200">
              <?php esc_html_e('Read More', 'wp-starter-theme'); ?>
            </a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <div class="mt-8">
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
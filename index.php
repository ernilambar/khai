<?php get_header();?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php if ( is_singular() ) : ?>
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail(); ?>
          <?php endif ?>
        <?php endif; ?>

        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
      </article>

      <?php if ( is_singular() ) : ?>
        <?php wp_enqueue_script( 'comment-reply' ); ?>
        <?php comments_template(); ?>
      <?php endif; ?>


    <?php endwhile; ?>

  <?php else : ?>

    <p>Not Found</p>

  <?php endif; ?>

<?php
  previous_posts_link();
  next_posts_link();
?>

<?php get_footer();?>

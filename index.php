<?php get_header();?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
      </article>

    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

  <?php else : ?>

    <p>Not Found</p>

  <?php endif; ?>

<?php
  if ( is_singular() )
  {
    post_password_required() || comments_template();
    get_option( 'thread_comments' )
    and comments_open( get_the_ID() )
    and wp_enqueue_script( 'comment-reply' );
    previous_post_link();
    next_post_link();
  }
  else
  {
    previous_posts_link();
    next_posts_link();
  }
?>

<?php get_footer();?>

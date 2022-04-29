<?php
/**
 * The main template file
 *
 * @package Khai
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_singular() ) : ?>
					<?php the_title( '<h1>', '</h1>' ); ?>
				<?php else : ?>
					<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php if ( ! is_singular() ) : ?>
						<?php the_post_thumbnail(); ?>
					<?php else : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif ?>
				<?php endif; ?>

				<?php if ( is_singular() ) : ?>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				<?php else : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</article>

			<?php if ( is_singular() ) : ?>
        <?php if ( ! is_singular( 'page' ) ) : ?>
          <?php the_post_navigation(); ?>
        <?php endif; ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		<?php endwhile; ?>

	<?php else : ?>

		<p>Not Found</p>

	<?php endif; ?>

	<?php the_posts_pagination(); ?>

<?php get_footer(); ?>

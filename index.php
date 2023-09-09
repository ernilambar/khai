<?php
/**
 * The main template file
 *
 * @package Khai
 */

get_header();
?>

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

        <?php if ( 'post'=== get_post_type() ) : ?>
          <p><span class="post-date"><a href="<?php echo esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ); ?>"><?php the_date( get_option( 'date_format' ) ); ?></a></span>&nbsp;|&nbsp;<span class="post-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span></p>
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

        <?php if ( 'post'=== get_post_type() ) : ?>
          <?php
          $categories_list = get_the_category_list( ', ' );
          $tags_list       = get_the_tag_list( '', ', ' );
          ?>
          <?php if ( $categories_list || $tags_list ) : ?>
            <p>
              <?php if ( $categories_list ) : ?>
                <span class="post-categories"><?php echo $categories_list; ?></span>
              <?php endif; ?>

              <?php if ( $tags_list ) : ?>
                &nbsp;|&nbsp;<span class="post-tags"><?php echo $tags_list; ?> </span>
              <?php endif; ?>
            </p>
          <?php endif; ?>
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

<?php
get_sidebar();
get_footer();

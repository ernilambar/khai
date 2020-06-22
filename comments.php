<?php
/**
 * The template for displaying comments
 *
 * @package Simplimum
 */

?>
<?php if ( $comments ) : ?>
	<div id="comments">
		<h3>Comments</h3>
		<?php wp_list_comments(); ?>
		<?php the_comments_navigation(); ?>
	</div><!-- comments -->
<?php endif; ?>
<?php if ( comments_open() || pings_open() ) : ?>
	<?php comment_form(); ?>
<?php elseif ( $comments ) : ?>
	<div id="respond"><p id="closed">Comments closed</p></div>
<?php endif; ?>

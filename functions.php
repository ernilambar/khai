<?php
/**
 * Theme functions
 *
 * @package Simplimum
 */

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function simplimum_planet_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'simplimum_planet_scripts' );


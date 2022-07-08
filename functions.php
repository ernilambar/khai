<?php
/**
 * Theme functions
 *
 * @package Khai
 */

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function khai_planet_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'khai_planet_scripts' );

/**
 * Register widget area.
 */
function khai_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'khai' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'khai' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}

add_action( 'widgets_init', 'khai_widgets_init' );

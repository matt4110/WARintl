<?php
/**
 * This page runs a query that picks a random story
 *
 * @Template Name: Story-Randomizer
 */


// set arguments for WP_Query()
$args = array(
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'post_type' => 'story'
);

// get a random post from the database
$my_random_post = new WP_Query ( $args );

// process the database request through WP_Query
while ( $my_random_post->have_posts () ) {
  $my_random_post->the_post ();
  // redirect the user to the random post
  wp_redirect ( get_permalink () );
  exit;
}

; ?>
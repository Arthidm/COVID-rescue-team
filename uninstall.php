<?php

/**
* Trigger this file on Plugin uninstall
*
* @package CovidResQ
*/

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  die;
}

// Clear Database stored data
// $redirections = get_posts( array( 'post_type' => 'redirection', 'numberposts' => -1 ) );

// foreach( $redirections as $redirection ) {
//   wp_delete_post( $redirection->ID, true );
// }

// Access the database via SQL
global $wpdb;

$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'redirection'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );

<?php

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

// Uninstall code goes here

delete_option('api_token');
delete_option('domain_name');
delete_option('success_message');
delete_option('nowebinars');
delete_option('contact_placement');
delete_option('display_alignment')
delete_option('success_message2');



global $wpdb;
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}mytable" );

?>

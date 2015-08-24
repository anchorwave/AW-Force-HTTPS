<?php
/*
Plugin Name: AW Force HTTPS (except feed)
Description: Forces every single page/post to go over HTTPS, but ignores feed (both https and http should be available)
Version: 999
*/

function aw_force_https () {
	// add statements like this to ignore other pages
	if ( is_page() ){
		//return;
	}
	// feed will be ignored
	if ( is_feed() ){
		return;
	} 
	if ( !is_ssl() ) {
		wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
		exit();
	}
}
add_action ( 'template_redirect', 'aw_force_https', 1 );

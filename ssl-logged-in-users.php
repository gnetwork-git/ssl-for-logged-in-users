<?php 
/*
Plugin Name: SSL for Logged In Users
Author URI: http://gnetwork.com.au/wordpress/
Plugin URI: http://gnetwork.com.au/wordpress/
Description: Forces all logged in users to stay on SSL connection for improved security.
Version: 0.1
License: GPLv2 or later
Author: G - gnetworkau
*/

force_ssl_admin(true);

function force_ssl() {

    if ( !is_ssl() && is_user_logged_in() ) {
		$secureurl = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];		
		wp_redirect($secureurl);
		exit();
		}
    }

if ( !is_admin() && !strpos($_SERVER["REQUEST_URI"], 'wp-login.php') )

add_action('plugins_loaded', 'force_ssl');

?>

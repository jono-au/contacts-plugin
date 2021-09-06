<?php 
/*
Plugin Name: Contacts
Plugin URI: https://jonochan.com.au/wp-content/plugins/contacts/
Description: Contact list plugin 
Version: 1.0
Requires at least: 5.2
Requires PHP: 7.2
Author: Jonathan Chan
Author URI: https://jonochan.com.au/
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;

//Act on plugin activation
register_activation_hook( __FILE__, "activate_contactlist" );

// Act on plugin de-activation
register_deactivation_hook( __FILE__, "deactivate_myplugin" );

// De-activate Plugin
function deactivate_myplugin() {

	// Execute tasks on Plugin de-activation
}

define ('CONTACTLIST_PLUGIN_DIR', plugin_dir_url(__FILE__));

require_once 'include/contactlist-shortcodes.php';
require_once 'include/contactlist-admin.php';




// Activate Plugin
function activate_contactlist() {

	// Execute tasks on Plugin activation

	// Insert DB Tables
	init_db_contactlist();
}

//Initialize DB tables

global $contactlist_version;
$contactlist_version = '2.0';

function init_db_contactlist(){
    //WP Globals
    global $wpdb;
    global $contactlist_version;

    $table_name = $wpdb->prefix . 'contactlist';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    phone varchar(20) DEFAULT '' NOT NULL,
    email varchar(100) DEFAULT '' NOT NULL,
    website varchar(100) NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'contactlist_version_version', $contactlist_version );


    //update table function
    function myplugin_update_db_check() {
        global $contactlist_version;
        if ( get_site_option( 'contactlist_version_version' ) != $contactlist_version ) {
            init_db_contactlist();
        }
    }
    add_action( 'plugins_loaded', 'myplugin_update_db_check' );

}

    //settings link
    add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'contactlist_settings_link');
        
    function contactlist_settings_link( $links ) {
        $links[] = '<a href="' .
            admin_url( 'admin.php?page=contactlist_list' ) .
            '">' . __('Settings') . '</a>';
        return $links;
}



?>
<?php



function contactlist_admin_menu() {
    add_menu_page(
        'Contact List',
        'Contact List',
        'manage_options',
        'contactlist_list',
        'contactlist_list',
        'dashicons-groups'
    );
    add_submenu_page(
        'contactlist_list',
        'Add New Contact',
        'Add New',
        'manage_options',
        'contactlist_insert',
        'contactlist_insert'
      
    );

}

add_action('admin_menu', 'contactlist_admin_menu');

/* Display contactlist action page */

function contactlist_list() {

    global $wpdb;
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions!');
    }
    //include CONTACTLIST_PLUGIN_DIR . 'pages/contactlist-list.php';
    include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
}

?>
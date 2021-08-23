<?php 
add_shortcode('contactlist', 'contactlist_user_form');

function contactlist_user_form($atts){
    include CONTACTLIST_PLUGIN_DIR . '/pages/contactlist-shortcode-form.php';
}

?>
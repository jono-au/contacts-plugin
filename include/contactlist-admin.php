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
        'contactlist_new',
        'contactlist_new'
      
    );

}

add_action('admin_menu', 'contactlist_admin_menu');


/*CONTACT list post action */
function contactlist_post_action(){
    global $wpdb;
    global $id;
    if (!empty($_POST)){
        $listaction = $_POST['listaction'];
        if(isset($_POST['contactid'])){
            $id = $_POST['contactid'];
        }
        switch ($listaction){
            case 'insert':
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-new.php");
                break;
            case 'edit':
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-edit.php");
                break;
            case 'list':
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
                break;
            case 'handleupdate':
                handle_contactlist_update();
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
                break;
            case 'handledelete':
                handle_contactlist_delete();
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
                break;
            case 'handlenew':
                handle_contactlist_new();
                include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
                break;
            default: 
                echo "<h2>Nothing Found!</h2>";
        }
    } else {
        include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-list.php");
    }
}




// add new contact
function handle_contactlist_new() {
    global $wpdb;

    $table = $wpdb->prefix . 'contactlist';
    
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['website'])){
        $website = $_POST['website'];
    }

    $wpdb->insert(
        $table,
        array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'website' => $website
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s',
        ) //data format

    );

}


//update contact
function handle_contactlist_update(){
    global $wpdb;

    $table = $wpdb->prefix . 'contactlist';
    
    if(isset($_POST['contactid'])){
        $id = $_POST['contactid'];
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['website'])){
        $website = $_POST['website'];
    }

    $wpdb->update(
        $table,
        array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'website' => $website
        ),
        array('ID'=>$id), //where
        array(
            '%s',
            '%s',
            '%s',
            '%s',
        ), //data format
        array('%s') // where format

    );

}



//delete contact
function handle_contactlist_delete(){
    global $wpdb;
    if(isset($_POST['contactid'])){
        $id = $_POST['contactid'];
        $sql = "DELETE FROM " . $wpdb->prefix . "contactlist WHERE id=$id";
        $wpdb->query($sql);
    }
}





/* Display contactlist action page */

function contactlist_list() {

    global $wpdb;
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions!');
    }
    
   
    //include( CONTACTLIST_PLUGIN_DIR . 'pages/contactlist-list.php');
    contactlist_post_action();
}

/* Display contactlist new page */

function contactlist_new() {

    global $wpdb;
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions!');
    }
    
    if(!empty($_POST)){
        contactlist_post_action();
    } else {
        include($_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/contacts/pages/contactlist-new.php");
    }
   
    
}

// hook in bootstrap css
function contactlist_css(){
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>";
}

add_action('admin_head', 'contactlist_css' );

?>
<?php

global $wpdb;
$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "contactlist";
$formData = $wpdb->get_results($SQL);

?>


<div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title()); ?></h1>


<form action="" method="post">
    <input type="hidden" name="listaction" value="insert" />
    <button type="submite" class="btn btn-primary" >Add New Contact</button>
</form>
   

    <table class="table">
        <tr class="info">
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Website</th>
            <th>Edit</th>
        </tr>


<?php
    if ($valid){
        foreach($wpdb->get_results($SQL) as $key =>$row ) {
            $id = $row->id;
            $name = $row->name;
            $phone = $row->phone;
            $email = $row->email;
            $website = $row->website;
            ?>

            <tr>
                <form action="" method="post">
                    <input type="hidden" name="listaction" value="edit" />
                    <input type="hidden" name="contactid" value="<?php echo $id; ?>" />
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $website; ?></td>
                    <td>
                        <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary">
                                    <span class="label label-primary glyphicon glyphicon-pencil" />
                                </button>
                        </div>
                    </td>
                </form>

            </tr>



            <?php
        }
    }
?>
</table>
</div>
<?php ?>

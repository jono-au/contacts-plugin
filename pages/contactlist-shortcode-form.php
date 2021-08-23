<?php

global $wpdb;
$valid = true;
$SQL = "SELECT * FROM" . $wpdb->prefix . "contactlist";
$formData = $wpdb->get_results($SQL);

if (!$formData) {
    $valid = false;
    echo $SQL . '<p> This form is invalid - please check </p>';
}

?>

<table class="table">
    <tr class="info">
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Job Description</th>
    </tr>


<?php
    if ($valid){
        foreach($wpdb->get_results($SQL) as $key =>$row ) {
            $name = $row->name;
            $phone = $row->phone;
            $email = $row->email;
            $job = $row->job;
            ?>

            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $job; ?></td>
            </tr>



            <?php
        }
    }
?>
</table>
<?php ?>

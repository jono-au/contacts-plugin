<?php

//display new form for single member

global $wpdb;
$SQL = "SELECT * FROM " . $wpdb->prefix . "contactlist WHERE id=$id";
$row = $wpdb->get_row($SQL);

$name = $row->name;
$phone = $row->phone;
$email = $row->email;
$website = $row->website;

?>

<h2>Contactlist Edit</h2>
<div class="col-md-8">
    <div class="card panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Contact Information</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post">

                <input type="hidden" name="contactid" value="<?php echo $id;?>">

                <div class="form-group">
                    <label for="frmName" class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmPhone" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmemail" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmwebsite" class="col-sm-4 control-label">Website</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="website" value="<?php echo $website;?>">
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit" name="listaction" value="handleupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handledelete" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delet this contact')";>Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php ?>

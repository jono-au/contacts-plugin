<?php

//display edit form for new contact


?>

<h2>Contactlist Add New Contact</h2>
<div class="col-md-8">
    <div class="card panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Contact Information</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post">

                <input type="hidden" name="contactid" value="">

                <div class="form-group">
                    <label for="frmName" class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmPhone" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="phone" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmemail" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="frmwebsite" class="col-sm-4 control-label">Website</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="website" value="">
                    </div>
                </div>

                <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit" name="listaction" value="handlenew" class="btn btn-success">Add New Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php ?>

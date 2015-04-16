<h2><?php echo 'Add User'; ?></h2>
<?php echo form_open('users/add', array('class' => 'form-horizontal')); ?>
<div class="form-group">
    <label for="UserName" class="col-sm-2 control-label">User Name :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="UserName" placeholder="Full Name">
        <?php echo form_error('name', '<div class="error">', '</div>'); ?>
    </div>
</div>
<div class="form-group">
    <label for="UserEmail" class="col-sm-2 control-label">User Email :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="email" id="UserEmail" placeholder="user@example.com">
        <?php echo form_error('email', '<div class="error">', '</div>'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success')); ?>
    </div>

</div>
<?php
echo form_close();

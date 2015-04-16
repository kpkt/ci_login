<h2>User Details 
    <p class="pull-right"><a href="<?php echo base_url("index.php/users/edit/" . $user['user_id']); ?>" class="btn btn-warning btn-sm">Edit User</a></p>
</h2>
<dl class="dl-horizontal">
    <dt>#ID</dt>
    <dd><?php echo $user['user_id'] ?></dd>
    <dt>NAMA</dt>
    <dd><?php echo $user['name'] ?></dd>
    <dt>EMAIL</dt>
    <dd><?php echo $user['email'] ?></dd>
    <dt>CREATED</dt>
    <dd><?php echo date('d-m-Y H:i A', strtotime($user['created'])) ?></dd>
    <dt>MODIFIED</dt>
    <dd><?php echo date('d-m-Y H:i A', strtotime($user['modified'])) ?></dd>
</dl>

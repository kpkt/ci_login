   <?php $authUser = $this->session->userdata('user_session'); ?>
<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" class=" <?php echo (empty($this->uri->segment(1)) ? 'active' : '') ?>"><a href="<?php echo base_url() ?>">Home</a></li>
            <li role="presentation" class=" <?php echo ($this->uri->segment(1) == 'users' ? 'active' : '') ?>"><a href="<?php echo base_url("index.php/users/index") ?>">Users</a></li>
            <li role="presentation" class=" <?php echo ($this->uri->segment(1) == 'posts' ? 'active' : '') ?>"><a href="<?php echo base_url("index.php/posts/index") ?>">Posts</a></li>
            <li role="presentation"><a href="<?php echo base_url("index.php/authentications/logout") ?>">Logout</a></li>
        </ul>
    </nav>
    <h3 class="text-muted">Project: Codeigniter CRUD : <?php echo $authUser['username'] ?></h3>
</div>
<?php
$message = $this->session->flashdata('item');
echo (!empty($message) ? '<div class="alert alert-' . $message['class'] . ' alert-dismissable" role="alert" id="infoMessage"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' . $message['message'] . '</div>' : '');
//$this->session->sess_destroy();

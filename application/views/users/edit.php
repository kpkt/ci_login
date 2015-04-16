<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<h2>Edit User</h2>';
echo form_open('users/edit/', array('class' => 'form-horizontal'), array('user_id' => $user['user_id']));

echo '<div class="form-group has-error">';
echo form_label('User Name :', null, 'control-label');
echo form_input(array('id' => 'UserName', 'name' => 'name', 'value' => $user['name']));
echo form_error('name', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_label('User Email :', null, 'control-label');
echo form_input(array('id' => 'UserEmail', 'name' => 'email', 'value' => $user['email']));
echo form_error('email', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_submit(array('name' => 'submit', 'value' => 'Submit'));
echo '</div>';

echo form_close();

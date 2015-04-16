<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    /**
     * __construct method     
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->isRegistered();
    }

    public function isRegistered() {
        if (($this->session->userdata('user_session') == FALSE)) {
            $this->session->set_flashdata('item', array('message' => 'You are not authorized. Please login!', 'class' => 'danger')); //danger or success            
            redirect('authentications/login');
        }
    }

    /**
     * index method     
     * @return void
     */
    public function index() {

        $data['users'] = $this->UserModel->listing();
        $data['main'] = '/users/index';
        $this->load->view('layouts/default', $data);
    }

    /**
     * add method     
     * @return void
     */
    public function add() {
        //set form validation
        $this->form_validation->set_rules(array(
            array('field' => 'name', 'label' => 'Username', 'rules' => 'required'),
            array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email')
        ));
        //if validation not run, just show form
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = '/users/add';
            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );
            $this->UserModel->create($data); //load model
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'The user has been saved', 'class' => 'success')); //danger or success            
            redirect('users/index'); // back to the index
        }
    }

    /**
     * edit method     
     * @param string user_id
     */
    public function edit($user_id = null) {
        //Cheching data is not empty
        if (!empty($user_id) && !$this->UserModel->exists($user_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('users/index'); // back to the index
        }
        //fetch user record for the given employee no
        $data['user'] = $this->UserModel->read($user_id);

        //set form validation
        $this->form_validation->set_rules(array(
            array('field' => 'name', 'label' => 'Username', 'rules' => 'required'),
            array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email')
        ));
        //if validation not run, just show form
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = '/users/edit';
            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );
            $this->UserModel->modified($data); //load model
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'The user has been saved', 'class' => 'success')); //danger or success            
            redirect('users/index'); // back to the index
        }
    }

    /**
     * view method     
     * @param string user_id
     */
    public function view($user_id) {
        //Cheching data is not empty
        if (!$this->UserModel->exists($user_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('users/index'); // back to the index
        }

        $data['user'] = $this->UserModel->read($user_id);
        $data['main'] = '/users/view';
        $this->load->view('layouts/default', $data);
    }

    /**
     * delete method     
     * @param string user_id
     */
    public function delete($user_id) {
        //Cheching data is not empty
        if (!$this->UserModel->exists($user_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('users/index'); // back to the index
        }

        if ($this->UserModel->delete($user_id)) {
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'User deleted', 'class' => 'success')); //danger or success            
            redirect('users/index'); // back to the index
        }
        #$this->session->set_flashdata('item', array('message' => 'User was not deleted', 'class' => 'danger')); //danger or success            
        #redirect('users/index'); // back to the index    
    }

}

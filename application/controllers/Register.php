<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates a bootstrap login form 
 * author: Solange Karsenty
 *  */

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // CodeIgniter does not connect necessarily to a database 
        // (you can write  a website witthout a database), so we explicitely do it
        // this instruction initialize DB connection and allow to run queries.
        $this->load->database();
    }

    // the default function: display the login form
    // http://localhost/Salaviz-Trachter/register
    public function index() {
        // the view checks for an "error" so we initialize
        // empty string
        $data = array("error" => "");
        // if an error message was stored in the session,
        // we pass it to the view
        if ($this->session->userdata('error'))
            $data['error'] = $this->session->userdata('error');
        // this is the login form
        $this->load->view("register", $data);
        // we don't want to show the error more than once
        // so we erase it after using it
        $this->session->set_userdata('error','');
    }
   
    // action of the login form
    // http://localhost/Salaviz-Trachter/checkregister
    // it redirects either to the login form or to the user home page
    public function checkregister() {
        $this->load->model('User_model');
        // this is how you write debugging output in application/controllers/logs
        //log_message('debug', "Form email: " . $this->input->post('email'));

        try {
            // search the user in the DB - use form param (email)
            $data = $this->User_model->register($this->input->post('email'));
            
            if (!$data) {
                // can register
               
                
                redirect('login', 'refresh');
                // you could also 
                // $this->load->view('user_profile', $data);
                // but then the URL http://localhost/Salaviz-Trachter/login/checkLogin should deal with
                // multiple situations (logged in or not)
                // it is better to have separate functions that deal with very different views
                // this function acts like a router: it will redirect the user towarsd the user
                // home page or towards the login form (in the else) 
            } else {
                // failed register, put an error message in the session
                $this->session->set_userdata('error', 'email already register... try again.');
                // jump to regist page to display the regist form 
                redirect('register', 'refresh');
            }
        } catch (Exception $exc) {  
            // model validation failed
            $this->session->set_userdata('error', 'Please enter an email and password');
            redirect('register', 'refresh');
        }
    }


}

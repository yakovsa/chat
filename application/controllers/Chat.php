<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates a bootstrap login form 
 * author: Solange Karsenty
 *  */

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // CodeIgniter does not connect necessarily to a database 
        // (you can write  a website witthout a database), so we explicitely do it
        // this instruction initialize DB connection and allow to run queries.
        $this->load->database();
        
        $this->load->model('Chat_model');
    }

    // the default function: display the login form
    // http://localhost/demos-ci/login
    public function index() {
        // the view checks for an "error" so we initialize
        // empty string
        $data = array("error" => "");
      
        // this is the login form
        $this->load->view("chat", $data);
       
    }
    // this is the restricted access home page of the user
    // http://localhost/demos-ci/login/home
    public function home()  {
      
              
                $this->load->view('chat', $data);
   
    }
    public function chat_list() {
        // prepare an empty array
        $data = array();
        // request all list of cars from the DB and insert in the array
        $data['chats'] = $this->Chat_model->chat_list();
        // pass it and load the view
        $this->load->view('chat', $data);
    }

}

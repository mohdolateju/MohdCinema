<?php
/*
 * This Class Loads the Register Page
 */
class Register_Controller extends CI_Controller{
    /**
     * Default Controller function
     */
    public function index(){
        //Loads Register page and form library needed to load the page
        $this->load->library('form_validation');
        $this->load->view("Register");
    }
}
?>
<?php
/**
 * This Method Loads the Edit Cart Page and the library need to load the page
 */
class EditCart_Controller extends CI_Controller
{
       /**Default Controller Method*/
       function index(){
           //resume session and load EditCart page
           session_start();
           $this->load->view("EditCart");
       }

}

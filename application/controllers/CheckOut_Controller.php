<?php
/**
 * This Method Loads the CheckOut Page and the library need to load the page
 */
class CheckOut_Controller extends CI_Controller
{
       /**Default Controller Method*/
       function index(){
           //resume session and load CheckOut page
           session_start();
           $this->load->view("CheckOut");
       }

}

<?php
/**
 * LogOut Controller Logs out a user
 */
class LogOut_Controller extends CI_Controller
{
    /**Default Controller Method*/
    function index(){
        //resume session
        session_start();
        //delete all session variables and load the Website Homepage
        session_unset();
        $this->load->view("index");
    }
}

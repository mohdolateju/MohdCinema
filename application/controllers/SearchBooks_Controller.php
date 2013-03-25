<?php
/**
 * This Controller Loads the SearchBooks Page
 */
class SearchBooks_Controller extends CI_Controller
{
    /**Default Controller method*/
    function index()
    {
        if(!empty($_GET)){
        //resumes session
        session_start();
        //loads SearchBooks Page
        $this->load->View("SearchBooks");
        }else{print("Get has been sent");}
    }
}

<?php
/**
 * This Controller Loads gets all the books from the database Using the Browse Book Model
 * and Loads them to the Browse Books Page
 */
class BrowseBooks_Controller extends CI_Controller
{
      /**Default Controller method*/
       function index(){
           //Resume Session
           session_start();
           //Load the Controller Specific Model
           $this->load->model("BrowseBooks_Model");
           //Gets all the books from the Database using the model and send it to the BrowseBooks page
           $data['books']=$this->BrowseBooks_Model->get_all_books();
           $this->load->View("BrowseBooks",$data);
       }
}

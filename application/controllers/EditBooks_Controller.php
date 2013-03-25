<?php
/**
 * Used to Load the Edit Books Page
 */
class EditBooks_Controller extends CI_Controller
{
       function index(){
           //Load Controller Specific Model
           $this->load->model("EditBooks_Model");
           //Gets all the books and loads the EditBooks page together with the books
           $data['books']=$this->EditBooks_Model->get_all_books();
           $this->load->View("EditBooks",$data);
       }
}

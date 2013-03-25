<?php
/**
 *  This Controller Deletes an author
 */
class DeleteAuthor_Controller extends CI_Controller
{
       /**Default Controller Method*/
       function index(){
           //loads the Model
           $this->load->model("DeleteAuthor_Model");

           //Gets the Author Id and Deletes the Author
           $authorid=$this->input->post('author_id');
           $author=$this->DeleteAuthor_Model->get_author_by_id($authorid);
           $this->DeleteAuthor_Model->delete_author($authorid);

           //Gets the data needed to load the Update Author Page and loads it
           $data['authorids']=$this->DeleteAuthor_Model->get_authorids();
           $data['success']="<div class='searcherror'>Author Successfully Delete</div>";
           $this->load->view("UpdateAuthor",$data);
       }
}


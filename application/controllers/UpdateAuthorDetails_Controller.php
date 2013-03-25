<?php
/**
 *  This Controller Updates the Details of An Author
 */
class UpdateAuthorDetails_Controller extends CI_Controller
{
       /**Default Controller method*/
       function index(){

           //loading the form validation library and setting rules to prevent invalid data
           $this->load->library('form_validation');
           $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
           $this->form_validation->set_rules('authorfname', 'Authors Firstname', 'trim|required');
           $this->form_validation->set_rules('authorlname', 'Authors Lastname', 'trim|required');

           //loading the model and getting all the need data for loading the Update Author page
           $this->load->model("UpdateAuthorDetails_Model");
           $data['authorids']=$this->UpdateAuthorDetails_Model->get_authorids();
           $authorid=$this->input->post('author_id');
           $author=$this->UpdateAuthorDetails_Model->get_author_by_id($authorid);
           $data['firstname']=$author['firstname'];
           $data['lastname']=$author['lastname'];
           $data['author_id']=$author['author_id'];

           //if an error occurs when validating form data return to Update Author Page with errors
           if($this->form_validation->run() == FALSE){

               $this->load->view("UpdateAuthor",$data);
           }
           //if no errors occur details are updated and success message is sent to the UpdateAuthor Page
           else{
               $this->UpdateAuthorDetails_Model->update_author($authorid,$this->input->post('authorfname'),
                                                                         $this->input->post('authorlname'));
               $author=$this->UpdateAuthorDetails_Model->get_author_by_id($authorid);
               $data['firstname']=$author['firstname'];
               $data['lastname']=$author['lastname'];
               $data['author_id']=$author['author_id'];
               $data['success']="<div class='searcherror'>Book Successfully Updated</div>";
               $this->load->view("UpdateAuthor",$data);
           }
       }
}

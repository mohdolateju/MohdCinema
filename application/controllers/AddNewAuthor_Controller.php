<?php
/**
 * This Controller Adds a new author to the database
 */
class AddNewAuthor_Controller extends CI_Controller
{
    /** Default Controller Method */
    function index()
    {
        //loading the form validation library and rules
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
        //loads model
        $this->load->model("AddNewAuthor_Model");

        //if form validation fails no new author is added
        if ($this->form_validation->run() == FALSE)
        {
            $firstname = $this->input->post('userlname');
            $lastname = $this->input->post('userfname');
            //gets logged in user's details and all author details which is needed for the admin page
            $data=$this->AddNewAuthor_Model->get_loggedin_user($firstname,$lastname);
            $data['authors']=$this->AddNewAuthor_Model->get_all_authors();
            $this->load->view('AdminDetails',$data);
        }
        //if form validation succeeds continue author creation process
        else{
            $authorfirstname = $this->input->post('firstname');
            $authorlastname = $this->input->post('lastname');
            $firstname = $this->input->post('userlname');
            $lastname = $this->input->post('userfname');
            $user=$this->AddNewAuthor_Model->get_loggedin_user($firstname,$lastname);
            $userexists=$this->AddNewAuthor_Model->ifauthorexists($authorfirstname ,$authorlastname);
                //if author exists send author exists message
                if($userexists){
                    $user['authorexists']="<span class='error'>Author Already Exists</span>";
                    $user['authors']=$this->AddNewAuthor_Model->get_all_authors();
                }else{
                //if author doesnt exist create new author
                    $id=$this->AddNewAuthor_Model->get_max_id();
                    $newid=(int)$id;
                    $nextid=$newid+1;
                    $this->AddNewAuthor_Model->set_new_author($nextid, $authorfirstname,$authorlastname);
                    $user['authors']=$this->AddNewAuthor_Model->get_all_authors();
                    $user['authorcreated']="<span class='error'>Author Successfully Created</span>";
                }
            //load data to AdminDetials
            $this->load->view('AdminDetails',$user);
        }

    }

}

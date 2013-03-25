<?php
/**
 *This Class is used to Register New Costumers to the Database
  */
class RegisterValidation_Controller extends CI_Controller {

    /**Default Controller Method*/
    function index()
    {
        //Initializing Form Library and setting rules for the Registration fields
        $this->load->library('form_validation');
        //div tag for form error messages
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password1', '1st Password', 'trim|required|matches[password2]|min_length[5]|xss_clean|md5');
        $this->form_validation->set_rules('password2', '2nd Password', 'trim|required|xss_clean|md5');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');

        //if an error occurs during form validation
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('RegisterUser');
        }
        //if no error occurs during form validation
        else
        {
            //Set New Costumer's Id and Success Message in Variable to be sent to Login Page(Homepage)
            $data['constumerid']=$this->create_new_costumer();
            $data['success']='Account Succesfully Created!';
            //Send New Costumer Data and Success Message to Login Page
            $this->load->view('index',$data);
        }

    }

    /**
     * This method creates a new Costumer from the Register Form
     * And returns the new costumer's id
     * @return Returns New costumer's Id as String
     */
    function create_new_costumer(){
        //Getting the data enter in the Register Form
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $password = $this->input->post('password1');
        $address = $this->input->post('address');
        //Loads This Controller's specific Model
        $this->load->model("RegisterValidation_Model");
        //Gets the Maximum costumer's id in the Database
        $id=$this->RegisterValidation_Model->get_max_costumerid();
        //Increamentt the max id by 1
        $newid=(int)$id;
        $nextid=$newid+1;
        //Create new costumer in the database
        $this->RegisterValidation_Model->set_new_costumer($nextid,$firstname,$lastname,$email,$password,$address);
        //Returns New Costumbers id
        return $firstname.$nextid;
    }
}
?>
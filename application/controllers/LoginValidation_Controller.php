<?php

/**This Class is Validates a the users on Login */
class LoginValidation_Controller extends CI_Controller{

    /**Default Code Iginter Controller Method*/
    function index()
    {
        //Initializing the form validation library and setting rules for the user id and password field
        $this->load->library('form_validation');
        //Error Delimiter Method Used so that the error messages can be styled
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        //Run Method to Start the Form Validation Process
        $formval=$this->form_validation->run();
        //Loading the Model for this Controller
        $this->load->model('LoginValidation_Model');
        //Method to Get User Details from form input
        $userdata=$this->get_userdetails();


        //If Error Occurs in Form Validation return to Login Page
        if ($formval == FALSE)
        {
            $this->load->view('Login');
        }
        //If User Data is Empty return to Login Page with error message
        else if(empty($userdata))
        {
            $data['message']='<span style=\"color: white; background-color: red;padding:0.3%\">
                                    Username and Password combination is incorrect</span>';
            $this->load->view('Login',$data);
        }
        //If User is a costumer send user information to  User Details page and create a new session with userid and type
        else
        {
            session_start();
            $_SESSION['customer_id']= $userdata['customer_id'];
            $_SESSION['firstname']= $userdata['firstname'];
            $_SESSION['lastname']= $userdata['lastname'];
            $_SESSION['email']= $userdata['email'];
            $_SESSION['username']= $userdata['username'];
            $_SESSION['type']="customer";
            $this->load->view('UserDetails');

        }
        //If User is an admin send user information to  Admin page and create a new session with userid and type
        if($userdata['type']=="admin")
        {
            session_start();
            $_SESSION['userid']= $userdata['user_id'];
            $_SESSION['type']= $userdata['type'];
            //Get All Authors from database to be used to Add New Book in the Admin Page
            $userdata['authors']=$this->LoginValidation_Model->get_all_authors();
            $this->load->view('AdminDetails',$userdata);
        }

    }

    /**
     *Gets User Details from the Login Form
     *@returns User Details as Array, Null if not a user
     */
    function get_userdetails(){
        $this->load->library('form_validation');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $UserDetails=$this->LoginValidation_Model->get_userdetails($username,$password);
        return $UserDetails;
    }
}
?>
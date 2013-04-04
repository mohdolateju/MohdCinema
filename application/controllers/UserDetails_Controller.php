<?php

/**This Class is Validates a the users on Login */
class UserDetails_Controller extends CI_Controller{

    /**Default Code Iginter Controller Method*/
    function index()
    {

        session_start();
        //If User is a costumer send user information to  User Details page and create a new session with userid and type
        if(!empty ($_SESSION['customer_id']) )
        {

            $this->load->view('UserDetails');
        }
        //if not session is present redirect the user to the home page
        else{

            header("Location: Home");
        }


    }

}
?>
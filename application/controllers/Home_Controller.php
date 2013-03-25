<?php
/**
 * This Controller Redirects a User to The User Home page or Website Homepage
 */
class Home_Controller extends CI_Controller{

    /**Default Controller Method*/
    public function index(){
       //resume session
       session_start();
       //load Cotroler specific Model
        $this->load->model("home_model");

           //If Global session variable has bees used
           if(!empty($_SESSION['type'])){

              //And the Global session variable is for a costumer
              //Load the Costumer details and load the UserDetails Page
               if($_SESSION['type']=="costumer")
               {
                   session_start();
                   $userdata['user_id']=$_SESSION['userid'];
                   $userdata=$this->home_model->get_userdetails($userdata['user_id']);
                   $this->load->view('UserDetails',$userdata);

               }

               //And the Global session variable is for an admin
               //Load the Admin details and load the Admin Page With the library need to load the page
               else if($_SESSION['type']=="admin")
               {
                   session_start();
                   $userdata['user_id']=$_SESSION['userid'];
                   $userdata=$this->home_model->get_userdetails($userdata['user_id']);
                   $userdata['authors']=$this->home_model->get_all_authors();
                   $this->load->library('form_validation');
                   $this->load->view('AdminDetails',$userdata);
               }

           }
           //If no session variable is found the no user is logged in
           //Redirect user to the Website Homepage
           else{
               $data['movies']=$this->home_model->get_new_movies(10);
               $this->load->view("index",$data);

           }
    }
}
?>
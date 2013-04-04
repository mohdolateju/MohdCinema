<?php
/**
 * The Hompage Controller
 */
class Home_Controller extends CI_Controller{

    /**Default Controller Method*/
    public function index(){
       //resume session
       session_start();
       //load Controller specific Model
        $this->load->model("home_model");
        //Get movies with a specific amount
        $data['movies']=$this->home_model->get_new_movies(10);
        $this->load->view("index",$data);
        }
}
?>
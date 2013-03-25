<?php
/**
 * This Controller Redirects a User to The User Home page or Website Homepage
 */
class AllMovies_Controller extends CI_Controller{

    /**Default Controller Method*/
    public function index(){
       //resume session
       //session_start();
       //load Controller specific Model
       $this->load->model("allmovies_model");
       $data['movies']=$this->allmovies_model->get_all_movies();
       $this->load->view("allMovies",$data);
    }
}
?>
<?php
/**
 * This Controller gets all movies from the database and displays
 */
class AllMovies_Controller extends CI_Controller{

    /**Default Controller Method*/
    public function index(){
       //resume session
       session_start();
       //load Controller specific Model
       $this->load->model("allmovies_model");
       //get all movies from database
       $data['movies']=$this->allmovies_model->get_all_movies();
       //load movies into the movies
       $this->load->view("AllMovies",$data);
    }
}
?>
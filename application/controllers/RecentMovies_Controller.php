<?php
/**
 * Controller to view recent movies
 */
class RecentMovies_Controller extends CI_Controller{

    /**Default Controller Method*/
    public function index(){
       //resume session
       session_start();
       //load Controller specific Model
       $this->load->model("recentmovies_model");
       //Load movies with a specific number
       $data['movies']=$this->recentmovies_model->get_new_movies(30);
       $this->load->view("RecentMovies",$data);
    }
}
?>
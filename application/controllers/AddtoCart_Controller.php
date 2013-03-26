<?php
/**
 * Adds the Currently View Book to the Variable
 */
class AddtoCart_Controller extends CI_Controller
{
    /**Defaualt Controller Method*/
     function index(){
             //resumes current session
             session_start();
             //get movie_id
             $movieid = $this->input->post('movie');
             $this->load->model("moviedetail_model");
             $details = $this->moviedetail_model->get_movie_details($movieid);
             //create a specific cart and send data to movie details page

             $_SESSION["movie$movieid"]=$details;
             $this->load->View("MovieDetails", $details);
     }
}

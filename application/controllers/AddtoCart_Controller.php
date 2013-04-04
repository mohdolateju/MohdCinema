<?php
/**
 * Adds the Currently View Movie to the Cart
 */
class AddtoCart_Controller extends CI_Controller
{
    /**Default Controller Method*/
     function index(){
             //resumes current session
             session_start();
             //get movie_id
             $movieid = $this->input->post('movie');
             $timingNo = $this->input->post('timingNo');
             //load model
             $this->load->model("moviedetail_model");
             //Get movie details with id
             $details = $this->moviedetail_model->get_movie_details($movieid);
             //Get All the showtimes in an array
             $movietiming=explode(",",$details["showtimes"]);
             //Get the show time select from the user
             $pos=$timingNo-1;
             $selctedtime=$movietiming["$pos"];
             //create a specific cart and send data to movie details page(Replaces the existing cart)
             $details=array_merge($details,array("selectetime"=>$selctedtime));
             $_SESSION["movie$movieid"]=$details;
             $this->load->View("MovieDetails", $details);
     }
}

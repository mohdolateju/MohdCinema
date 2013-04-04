<?php
/**
 * Remove the Cart from the session
 */
class RemoveItem_Controller extends CI_Controller
{
       function index(){
           //resume session
           session_start();
           //get movieid and quantity
           $movie = $this->input->post('movie');
           $this->load->model("moviedetail_model");
           //remove cart from session and Loads the EditCart Page
           unset ($_SESSION['movie'.$movie]);
           header("Location: MovieDetail?movie=$movie");
       }

}

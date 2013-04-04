<?php
/**
 * This Controller Gets the details of a particular movie and sends it to the BookDetail page to be displayed
 */
class MovieDetail_Controller extends CI_Controller
{
    function index()
    {
        session_start();
        //if the book variable from the url is set
        if (isset($_GET['movie'])) {
            //resume the session
            //session_start();
            //get the book id
            $movieid = $_GET['movie'];
            //load the model and get the book details in the database
            $this->load->model("moviedetail_model");
            $moviedetails = $this->moviedetail_model->get_movie_details($movieid);
            //Sends the movie details to the BookDetail page
            $this->load->View("MovieDetails", $moviedetails);
        } else {
            //if the page variable is set redirect the user back to the previous page
            if(isset($_GET['page'])) {
            $page=$_GET['page'];
            header("Location:".$page);
            }else{
            //if the movie variable isn't set redirect the user back to the home page
                header("Location: Home");
            }
        }

    }
}

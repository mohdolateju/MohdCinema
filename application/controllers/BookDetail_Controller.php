<?php
/**
 * This Controller Gets the details of a particulat book and sends it to the BookDetail page to be desplayed
 */
class BookDetail_Controller extends CI_Controller
{
    function index()
    {
        //if the book variable from the url is set
        if (isset($_GET['book'])) {
            //resume the session
            session_start();
            //get the book id
            $bookid = $_GET['book'];
            //load the model and get the book details in the database
            $this->load->model("BookDetail_Model");
            $bookdetails = $this->BookDetail_Model->get_books_details($bookid);
            //Sends the book details to the BookDetail page
            $this->load->View("BookDetail", $bookdetails);
        } else {
            //if the book variable isnt set redirect the user back to the BrowseBooks page
            $this->load->View("BrowseBooks");
        }

    }
}

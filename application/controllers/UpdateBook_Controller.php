<?php
/**
 * This Controller Load the Update Book Page
 */
class UpdateBook_Controller extends CI_Controller
{
    function index()
    {
        //load model
        $this->load->model("UpdateBook_Model");

        //if the request to update a book is sent via GET method and the book variable is not empty
        //load the information about the book with the Update book page
        if (isset($_GET['book'])&&!empty($_GET['book'])) {
            $bookid = $_GET['book'];
            //data need to load the Update Book Page
            $details= $this->UpdateBook_Model->get_book_details($bookid);
            $details['authors']=$this->UpdateBook_Model->get_all_authors();
            $this->load->View("UpdateBook", $details);
        }
        //if nothing is set in the GET book variable loads the Browsebooks page
        else {
            //Gets all the books from the Database using the model and send it to the BrowseBooks page
            $data['books']=$this->UpdateBook_Model->get_all_books();
            $this->load->View("BrowseBooks",$data);
        }
    }
}

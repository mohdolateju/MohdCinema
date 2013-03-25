<?php
/**
 * This Controller Deletes a Book from the database
 */
class DeleteBook_Controller extends CI_Controller
{

    function index()
    {
        //load model
        $this->load->model("DeleteBook_Model");

        //if the request to delete a book is sent via GET method and the book variable is not empty
        //Delete bhe book and load the information about the book with the Edit book page
        if (isset($_GET['book'])&&!empty($_GET['book'])) {
            session_start();
            $bookid = $_GET['book'];
            $author=$this->DeleteBook_Model->get_author_by_bookid($bookid);
            unlink('book_images/'.$bookid.$author['lastname'].'.jpg');
            $this->DeleteBook_Model->delete_book($bookid);
            $data['books'] = $this->DeleteBook_Model->get_all_books();
            $data['delsuccess'] = "Book successfully deleted";
            $this->load->View("EditBooks", $data);
        }
        //if nothing is set in the GET book variable loads the Edit books page
        else {
            //load the EditBooks pagewith status message and data needed to load page
            $data['books']=$this->DeleteBook_Model->get_all_books();
            $data['delsuccess'] = "Book could not be deleted";
            $this->load->View("EditBooks",$data);
        }

    }
}

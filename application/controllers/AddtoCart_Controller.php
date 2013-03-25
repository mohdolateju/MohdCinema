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
             //get bookid and quantity
             $bookid = $this->input->post('book');
             $quantity = $this->input->post('quantity');
             $this->load->model("BookDetail_Model");
             $details = $this->BookDetail_Model->get_books_details($bookid);
             $cart=array_merge($details,array("quantity"=>$quantity));
             //replace quantity in sesssion and send data to book details page
             $_SESSION['cart'.$bookid]=$cart;
             $this->load->View("BookDetail", $details);
     }
}

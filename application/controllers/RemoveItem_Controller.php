<?php
/**
 * Remove the Cart from the session
 */
class RemoveItem_Controller extends CI_Controller
{
       function index(){
           //resume session
           session_start();
           //get bookid and quantity
           $book = $this->input->post('book');
           $quantity = $this->input->post('quantity');
           $this->load->model("BookDetail_Model");
           $details = $this->BookDetail_Model->get_books_details($book);
           $cart=array_merge($details,array("quantity"=>$quantity));
           //remove cart from sesssion and Loads the EditCart Page
           unset ($_SESSION['cart'.$book]);
           $this->load->view("EditCart");
       }

}

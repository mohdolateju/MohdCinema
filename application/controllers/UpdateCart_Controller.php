<?php
/**
 * Updates the Cart Informations of a session
 */
class UpdateCart_Controller extends CI_Controller
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
         //replace quantity in session
         $_SESSION['cart'.$book]=$cart;
         $this->load->view("EditCart");
     }
}

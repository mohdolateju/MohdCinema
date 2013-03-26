<?php
/**
 * This Method Loads the CheckOut Page and the library need to load the page
 */
class CheckOut_Controller extends CI_Controller
{
       /**Default Controller Method*/
       function index(){
           //resume session and load CheckOut page
           session_start();
           $vouchers=array();
           $customer_id=$_SESSION['customer_id'];
           foreach($_SESSION as $cart){
               if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                   ||$cart==$_SESSION['lastname']
                   ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){
                   //Do not display the content if is is part of the user information
               }
               else{
                   $this->load->model("checkout_model");
                   $movie_id=$cart['movie_id'];
                   $voucher=$this->generate_voucher();
                   while($this->checkout_model->voucher_exist($voucher)){
                       $voucher=$this->generate_voucher();
                   }
                   $this->checkout_model->store_voucher($voucher, $movie_id,$customer_id);
                   $vouchers["voucher$movie_id"]=$voucher;
               }
           }

           $data['vouchers']=$vouchers;
           $this->load->view("CheckOut",$data);
       }

        function generate_voucher(){
            $number=rand(11111111,99999999999999999999999999999999999999);
            return md5($number);
        }
}

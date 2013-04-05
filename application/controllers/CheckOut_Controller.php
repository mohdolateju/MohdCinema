<?php
/**
 * This Class Class Check out the movies in the cart
 */
class CheckOut_Controller extends CI_Controller
{
       //variables to hold screen numbers
       private $screen;
       private $screens=array();

        /**Default Controller Method*/
       function index(){
           //max number of seat in one cinema
           //define("MAXSEATNO",30);

           //array to load the selected movies
           $selectedtimes=array();

           //resume session and load CheckOut page
           session_start();

           //load model
           $this->load->model("checkout_model");

           //create vouchers and seatNo Arrays
           $vouchers=array();
           $seatNo=array();

           $customer_id=$_SESSION['customer_id'];

           //loop through everything in the sessions
           foreach($_SESSION as $cart){
               if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                   ||$cart==$_SESSION['lastname']
                   ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){

                   //Do not display the content if is is part of the user information
               }
               else{
                   //get movie id
                   $movie_id=$cart['movie_id'];

                   //Try to Get the maxScreen No if none exist make it the first one
                   if($this->checkout_model->getMaxScreenNo($movie_id)<1){
                       $this->screen=1;
                   }else{
                       //get the screen number from the database if it any exists
                       $this->screen=$this->checkout_model->getMaxScreenNo($movie_id);
                   }
                   //get selected time and add it to the array
                   $selectedtime=$cart['selectetime'];
                   $selectedtime.=":00";
                   $selectedtimes["time$movie_id"]=$selectedtime;
                   //Generate voucher
                   $voucher=$this->generate_voucher();
                   while($this->checkout_model->voucher_exist($voucher)){
                       $voucher=$this->generate_voucher();
                   }
                   //Generate Voucher and seat no and add it the database
                   $vouchers["voucher$movie_id"]=$voucher;
                   $seat=$this->generate_setno($movie_id,$this->screen);
                   $seatNo["seat$movie_id"]=$seat;
                   $this->checkout_model->store_voucher($voucher, $movie_id,$customer_id,$seat,$selectedtime,$this->screen);
                   $this->screens["screen$movie_id"]=$this->screen;
               }
           }
           //add all generated information to the CheckOut page
           $data['selectedtimes']=$selectedtimes;
           $data['vouchers']=$vouchers;
           $data['seatNo']=$seatNo;
           $data['screens']= $this->screens;
           $this->load->view("CheckOut",$data);
       }

        //Generate a random voucher
        function generate_voucher(){
            $number=rand(11111111,99999999999999999999999999999999999999);
            return md5($number);
        }

        //Get a unique seat number
        function generate_setno($movie_id,$screen){
            //Get the maximum seat number for a the last screen number
            $seatNo=$this->checkout_model->getMaxSeatNo($movie_id,$this->screen);

            //if screen no is less that maximum amount add 1 to it and return the value
            if($seatNo<30){
                return $seatNo+1;
            }
            //if non exists make the first one
            else if($seatNo==null){
                return 1;
            }
            //if seat number is equal to or greater that the maximum allowed seat no
            //increase the screen number and set the seat no to 1
            else if($seatNo>=30){
                $this->screen+=1;
                return 1;
            }
        }
}

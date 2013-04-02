<?php
/**
 * This Method Loads the CheckOut Page and the library need to load the page
 */
class CheckOut_Controller extends CI_Controller
{
       /**Default Controller Method*/
       private $screen;
       private $screens=array();

       function index(){
           define("MAXSEATNO",30);

           $selectedtimes=array();
           //resume session and load CheckOut page
           session_start();

           $this->load->model("checkout_model");

           $vouchers=array();
           $seatNo=array();

           $customer_id=$_SESSION['customer_id'];
           foreach($_SESSION as $cart){
               if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                   ||$cart==$_SESSION['lastname']
                   ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){
                   //Do not display the content if is is part of the user information
               }
               else{
                   $movie_id=$cart['movie_id'];

                   if($this->checkout_model->getMaxScreenNo($movie_id)<1){
                       $this->screen=1;
                   }else{
                       $this->screen=$this->checkout_model->getMaxScreenNo($movie_id);
                   }

                   $selectedtime=$cart['selectetime'];
                   $selectedtime.=":00";
                   $selectedtimes["time$movie_id"]=$selectedtime;
                   $voucher=$this->generate_voucher();
                   while($this->checkout_model->voucher_exist($voucher)){
                       $voucher=$this->generate_voucher();
                   }

                   $vouchers["voucher$movie_id"]=$voucher;
                   $seat=$this->generate_setno($movie_id,$this->screen);
                   $seatNo["seat$movie_id"]=$seat;
                   $this->checkout_model->store_voucher($voucher, $movie_id,$customer_id,$seat,$selectedtime,$this->screen);
                   $this->screens["screen$movie_id"]=$this->screen;
               }
           }
           $data['selectedtimes']=$selectedtimes;
           $data['vouchers']=$vouchers;
           $data['seatNo']=$seatNo;
           $data['screens']= $this->screens;
           $this->load->view("CheckOut",$data);
       }

        function generate_voucher(){
            $number=rand(11111111,99999999999999999999999999999999999999);
            return md5($number);
        }

        function generate_setno($movie_id,$screen){
            $seatNo=$this->checkout_model->getMaxSeatNo($movie_id,$this->screen);

            if($seatNo<MAXSEATNO){
                return $seatNo+1;
            }
            else if($seatNo==null){
                return 1;
            }
            else if($seatNo>=MAXSEATNO){
                $this->screen+=1;
                return 1;
            }
        }
}

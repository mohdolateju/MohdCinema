<?php require_once("application/views/pageComp/TopHeader.php")?>
    <title>Check Out :: Mohammed's Cinema</title>
<?php require_once("application/views/pageComp/BottomHeader.php")?>
<?php require_once("application/views/pageComp/MainMenu.php")?>
<?php require_once("application/views/pageComp/ExtraMenu.php")?>
        <section id="body">

            <section id="movies" style="display: block;">
                <div style="padding: 3%;text-align: center;background-color: gray;margin: 2%;">You have Checked Out, Have A Wonderful Experience.
                                         Print or Take note of the Ticket Number(s) To Enter the Cinema.
                    <input type="button" class="button" value="Print" onclick="window.print()" />
                </div>
        <?php

                //Displays Each content of the Cart
                foreach($_SESSION as $cart){
                    //Do not display the content if is is part of the user information
                    if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                        ||$cart==$_SESSION['lastname']
                        ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){

                    }
                    else{
                        $ecq="\""; // Used to replace return carriage quote
                        $presentMovieId=$cart['movie_id'];
                        $showtime=$selectedtimes["time$presentMovieId"];
                        print("<article
                                    class=$ecq"."movie"."$ecq style= $ecq display: -webkit-inline-box;$ecq>
                               <img id=$ecq movie $ecq alt= $ecq".$cart['title']." $ecq
                                    src=$ecq images/".$cart['movie_id'].".jpg $ecq
                                    width=$ecq 294 $ecq height=$ecq 452 $ecq/>

                               <div style=$ecq width:600px; padding-left: 2%; padding-top: 2%;text-align: justify;$ecq>
                                     <span class=$ecq detail $ecq>Title: </span>". $cart['title']."<br/><br/>
                                     <span class=$ecq detail $ecq>Price: </span> ". $cart['price']." AED<br/><br/>
                                     <span class=$ecq detail $ecq>ShowTimes: </span> ". $cart['starring']." <br/><br/>
                                     <span class=$ecq detail $ecq>Director: </span> ". $cart['firstname'].
                                                                                    " ".  $cart['lastname']."<br/><br/>

                                     <span class=$ecq detail $ecq>Voucher: </span> ". $vouchers["voucher$presentMovieId"]." <br/><br/>
                                     <span class=$ecq detail $ecq>Seat No: </span> ". $seatNo["seat$presentMovieId"]." <br/><br/>
                                     <span class=$ecq detail $ecq>ShowTime: </span> ".
                                        date("g:i a, l j F, Y", strtotime($showtime) )." <br/><br/>
                                     <span class=$ecq detail $ecq>Screen Number: </span> ". $screens["screen$presentMovieId"]." <br/><br/>
                               </div>

                               ");
                        //removes all session variables from cart
                        unset ($_SESSION['movie'.$presentMovieId]);
                        echo "</article>\n";
                    }
                 }
        ?>
            </section>
        </section>
<?php require_once("application/views/pageComp/EndPage.php")?>

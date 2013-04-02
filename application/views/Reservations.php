<?php require_once("application/views/TopHeader.php")?>
    <title>Reservations :: Mohammed's Cinema</title>
<?php require_once("application/views/BottomHeader.php")?>
<?php require_once("application/views/MainMenu.php")?>
<?php require_once("application/views/ExtraMenu.php")?>
    <section id="body" style="margin-top: 2%;margin-left: 35%;min-height: 450px;display: block;">
        <!--Details of the User-->
        Reservations<br/><br/>
        <span class="detail">Firstname:</span> <?php echo $_SESSION['firstname']?><br/><br/>
        <span class="detail">Lastname:</span> <?php echo $_SESSION['lastname']?><br/><br/>
        <span class="detail">Email:</span> <?php echo $_SESSION['email']?><br/><br/>
        <span class="detail">Username:</span> <?php echo $_SESSION['username']?><br/><br/>

        <?php

        //Displays Each content of the Cart
        foreach($_SESSION as $cart){
            if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                ||$cart==$_SESSION['lastname']
                ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){
                //Do not display the content if is is part of the user information
            }
            else{
                $ecq="\"";
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
                                     <span class=$ecq detail $ecq>Screen Number: </span> ". $screen." <br/><br/>
                               </div>

                               ");

                echo "</article>\n";
            }
        }

        //removes all session variables
        // session_unset();
        ?>
    </section>
<?php require_once("application/views/EndPage.php")?>

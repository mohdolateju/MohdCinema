    <?php require_once("application/views/pageComp/TopHeader.php")?>
		<title>EditCart :: Mohammed's Cinema</title>
    <?php require_once("application/views/pageComp/BottomHeader.php")?>
    <?php require_once("application/views/pageComp/MainMenu.php")?>
    <?php require_once("application/views/pageComp/ExtraMenu.php")?>
        <section id="body" style="min-height: 450px;">
            <?php

            $cartNo=0;
            foreach($_SESSION as $cart){
                //Do not iterate if the content of the global session is the user information
                if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                    ||$cart==$_SESSION['lastname']
                    ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){


                }else{
                //count the number of movies in the cart
                $cartNo++;}
            }
            //movies are more than 3 show the left slider bar
            if($cartNo>3) {
                print("<aside id=\"left_bar\" onclick=\"sliderforward()\"></aside>");
            }?>

          <section id="movies">
              <?php
              $emptyCart;//boolean variable to indicate if the cart is empty

              foreach($_SESSION as $cart){
                  //Do not iterate if the content of the global session is the user information
                  if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                      ||$cart==$_SESSION['lastname']
                      ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){


                  }//if cart is empty make the emptyCart variable true
                  else if(empty($cart['movie_id'])){
                      $emptyCart=true;
                    }
                  //Display movies in the cart
                  else{
                      $ecq="\""; // Used to replace return carriage quote
                      print("<article id=$ecq"."movie".$cart['movie_id']."$ecq
                                    class=$ecq"."movie"."$ecq>
                                    <a href=$ecq"."MovieDetail" . "?movie=" . $cart['movie_id'] ."\">
                                           <img id=$ecq movie $ecq alt= $ecq".$cart['movie_id']." $ecq
                                                src=$ecq images/".$cart['movie_id'].".jpg $ecq
                                                width=$ecq 294 $ecq height=$ecq 452 $ecq/>
                                    </a>
                               </article>\n");
                  }


              }
              //if the cart is empty show that the cart is empty! :)
              if($emptyCart){
                  echo "<div style=\"text-align: center;width: 100%;margin-top: 5%;\">Chart is Empty</div>";}
              ?>
              <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
          </section>
            <?php //If Images are equal to or more than 3 show right side bar
            if(sizeof($cartNo)>3) {
                print("<aside id=\"right_bar\" onclick=\"sliderforward()\"></aside>");
            }?>
		</section>
    <?php require_once("application/views/pageComp/EndPage.php")?>

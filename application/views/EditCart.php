    <?php require_once("application/views/TopHeader.php")?>
		<title>EditCart :: Mohammed's Cinema</title>
    <?php require_once("application/views/BottomHeader.php")?>
    <?php require_once("application/views/MainMenu.php")?>
    <?php require_once("application/views/ExtraMenu.php")?>
        <section id="body">
            <?php //If Images are equal to or more than 3 show right side bar
            if(sizeof($cart)>11) {
                print("<aside id=\"left_bar\" onclick=\"sliderforward()\"></aside>");
            }?>
          <section id="movies">
              <?php

              foreach($_SESSION as $cart){

                  if($cart==$_SESSION['customer_id']||$cart==$_SESSION['type']||$cart==$_SESSION['firstname']
                      ||$cart==$_SESSION['lastname']
                      ||$cart==$_SESSION['email']||$cart==$_SESSION['username']||$cart==$_SESSION['type']){

                      //Do not iterate if the content of the global session is the user information
                  }else{
                      $ecq="\"";
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

              ?>
              <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
          </section>
            <?php //If Images are equal to or more than 3 show right side bar
            if(sizeof($cart)>11) {
                print("<aside id=\"right_bar\" onclick=\"sliderforward()\"></aside>");
            }?>
		</section>
    <?php require_once("application/views/EndPage.php")?>

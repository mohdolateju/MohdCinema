    <?php require_once("application/views/TopHeader.php")?>
		<title><?php echo $title ?> :: Mohammed's Cinema</title>
    <?php require_once("application/views/BottomHeader.php")?>
    <?php require_once("application/views/MainMenu.php")?>
    <?php require_once("application/views/ExtraMenu.php")?>
        <section id="body">
          <section id="movies">
              <?php
                        $ecq="\"";
                        print("<article
                                    class=$ecq"."movie"."$ecq style= $ecq display: inline;$ecq>
                               <img id=$ecq movie $ecq alt= $ecq".$title." $ecq
                                    src=$ecq images/".$movie_id.".jpg $ecq
                                    width=$ecq 294 $ecq height=$ecq 452 $ecq/>

                               <div style=$ecq width:600px; padding-left: 2%; padding-top: 2%;text-align: justify;$ecq>
                                     <span class=$ecq detail $ecq>Title:</span> $title<br/><br/>
                                     <span class=$ecq detail $ecq>Price:</span> $price AED<br/><br/>
                                     <span class=$ecq detail $ecq>Director:</span> $firstname $lastname<br/><br/>
                                     <span class=$ecq detail $ecq>Description:</span> $description<br/><br/>
                                     <span class=$ecq detail $ecq>Genre:</span> $genre <br/><br/>
                                     <span class=$ecq detail $ecq>ShowTimes:</span> $showtimes <br/><br/>
                                     <span class=$ecq detail $ecq>Release Date:</span> $date <br/><br/>
                               </div>

                               ");
                        //adding Buttons for Logged in users
                        require_once("application/views/UserButtons.php");

                        echo "</article>\n";

              ?>
              <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
          </section>
		</section>
    <?php require_once("application/views/EndPage.php")?>

    <?php require_once("application/views/pageComp/TopHeader.php")?>
		<title>All Movies :: Mohammed's Cinema</title>
    <?php require_once("application/views/pageComp/BottomHeader.php")?>
    <?php require_once("application/views/pageComp/MainMenu.php")?>
    <?php require_once("application/views/pageComp/ExtraMenu.php")?>
        <section id="body">
          <aside id="left_bar" onClick="sliderbackward()"></aside>
          <section id="movies">
              <?php
                    //For each movie sent from the controller, display the poster of the image
                    foreach($movies as $movie){
                        $ecq="\""; // Used to replace return carriage quote
                        print("<article id=$ecq"."movie".$movie['movie_id']."$ecq
                                    class=$ecq"."movie"."$ecq>
                                    <a href=$ecq"."MovieDetail" . "?movie=" . $movie['movie_id'] .
                                    "&page=AllMovies"."\">
                                           <img id=$ecq movie $ecq alt= $ecq".$movie['title']." $ecq
                                                src=$ecq images/".$movie['movie_id'].".jpg $ecq
                                                width=$ecq 294 $ecq height=$ecq 452 $ecq/>
                                    </a>
                               </article>\n");
                    }
              ?>
              <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
          </section>
          <aside id="right_bar" onClick="sliderforward()"></aside>     	          	          
		</section>
    <?php require_once("application/views/pageComp/EndPage.php")?>

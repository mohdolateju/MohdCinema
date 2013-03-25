    <?php require_once("application/views/TopHeader.php")?>
		<title>All Movies :: Mohammed's Cinema</title>
    <?php require_once("application/views/BottomHeader.php")?>
    <?php require_once("application/views/MainMenu.php")?>
    <?php require_once("application/views/ExtraMenu.php")?>
        <section id="body"> 
          <aside id="left_bar" onClick="sliderbackward()"></aside>  
          <section id="movies">
              <?php
                    foreach($movies as $movie){
                        $ecq="\"";
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
    <?php require_once("application/views/EndPage.php")?>

    <?php require_once("application/views/pageComp/TopHeader.php")?>
		<title>Recent Movies :: Mohammed's Cinema</title>
    <?php require_once("application/views/pageComp/BottomHeader.php")?>
    <?php require_once("application/views/pageComp/MainMenu.php")?>
    <?php require_once("application/views/pageComp/ExtraMenu.php")?>
        <section id="body"> 
          <aside id="left_bar" onClick="sliderbackward()"></aside>  
          <section id="movies">
              <?php
                    //Display all movies
                    foreach($movies as $movie){
                        $ecq="\"";
                        print("<article id=$ecq"."movie".$movie['movie_id']."$ecq
                                    class=$ecq"."movie"."$ecq>
                                    <a href=$ecq"."MovieDetail" . "?movie=" . $movie['movie_id'] .
                                        "&page=RecentMovies"."\">
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

    <?php require_once("application/views/pageComp/TopHeader.php")?>
		<title>Search Movies :: Mohammed's Cinema</title>
    <?php require_once("application/views/pageComp/BottomHeader.php")?>
    <?php require_once("application/views/pageComp/MainMenu.php")?>
    <?php require_once("application/views/pageComp/ExtraMenu.php")?>
    <?php $this->load->library('form_validation');?>
    <?php $this->load->helper('url');?>
        <section id="body" style="display: block;">

            <section id="searchform">
                <form style="padding-left: 25%;" action="SearchMovies" method="post">
                    <label>Search Movie</label>
                    <input type="text" name="searchvalue" value="<?php echo set_value('searchvalue'); ?>"/>
                    <input type="submit" value="Submit" class="button"/>
                </form>
               <?php echo form_error('searchvalue');?>
            </section>

            <section style="padding: 1% 0% 1% 0%; display: -webkit-box">

                <?php
                //If Images are equal to or more than 3 show  left side bar
                    if(sizeof($movies)>=3) {
                        print("<aside id=\"left_bar\" onclick=\"sliderbackward()\"></aside>");
                }?>

                      <section id="movies">
                          <?php
                          //variable for quotes escape character
                          $ecq="\"";
                          // If any movies are available display each of them
                          if(!empty($movies)) {
                                foreach($movies as $movie){
                                    print("<article id=$ecq"."movie".$movie['movie_id']."$ecq
                                                class=$ecq"."movie"."$ecq>
                                                <a href=$ecq"."MovieDetail" . "?movie=" . $movie['movie_id'] .
                                                "&page=SearchMovies"."\">
                                                   <img id=$ecq movie $ecq alt= $ecq".$movie['title']." $ecq
                                                        src=$ecq images/".$movie['movie_id'].".jpg $ecq
                                                        width=$ecq 294 $ecq height=$ecq 452 $ecq/>
                                                </a>
                                           </article>\n");
                                }
                          // If movies are not available and they have been searched for Tell the user that they
                          //Could not be found
                          }else if(isset($movies)){
                              echo "<div style=$ecq padding-left: 40%; padding-top: 1%;$ecq> Movie Not Found </div>";
                          }
                          ?>
                          <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
                      </section>

                <?php //If Images are equal to or more than 3 show right side bar
                    if(sizeof($movies)>=3) {
                        print("<aside id=\"right_bar\" onclick=\"sliderforward()\"></aside>");
                }?>
            </section>

		</section>
    <?php require_once("application/views/pageComp/EndPage.php")?>

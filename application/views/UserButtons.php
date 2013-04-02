<div id="userbuttons">
    <?php
    session_start();
        if($_SESSION['type']=='customer'){
            if(!isset($_SESSION['movie'.$movie_id])){
                    print("<form name=\"cart\" method=\"post\" action=\"AddtoCart\">
                                      <input type=\"hidden\" name=\"movie\" value=\"{$movie_id}\"/>
                                      <input type=\"hidden\" id='timingNo' name=\"timingNo\" value=\"1\"/>
                                      <input type=submit class='button' style='width: auto' value=\"Add to Cart\"/>
                                    </form><br>");
            }
            if(isset($_SESSION['movie'.$movie_id])){
                    print("<form name=\"cart\" method=\"post\" action=\"RemoveItem\">
                                      <input type=\"hidden\" name=\"movie\" value=\"{$movie_id}\"/>
                                      <input type=submit class='button' style='width: auto' value=\"Remove From Cart\"/>
                            </form><br>");
            }
        }else if($_SESSION['type']=='admin'){
            print("
                        <a href=\"#\">Edit Movie</a>
                        <a href=\"#\">Delete Movie</a>
                  </nav>");
        }
    ?>
</div>

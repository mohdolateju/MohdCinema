<div id="userbuttons">
    <?php
    //resume session
    session_start();
        //If type variable in the session is set that means a session has been created and user is logged in
        if($_SESSION['type']=='customer'){
            //if the movie is not in the cart show include the add cart form & button
            if(!isset($_SESSION['movie'.$movie_id])){
                    print("<form name=\"cart\" method=\"post\" action=\"AddtoCart\">
                                      <input type=\"hidden\" name=\"movie\" value=\"{$movie_id}\"/>
                                      <input type=\"hidden\" id='timingNo' name=\"timingNo\" value=\"1\"/>
                                      <input type=submit class='button' style='width: auto' value=\"Add to Cart\"/>
                                    </form><br>");
            }
            //if the movie is in the cart include the remove cart form & button
            if(isset($_SESSION['movie'.$movie_id])){
                    print("<form name=\"cart\" method=\"post\" action=\"RemoveItem\">
                                      <input type=\"hidden\" name=\"movie\" value=\"{$movie_id}\"/>
                                      <input type=submit class='button' style='width: auto' value=\"Remove From Cart\"/>
                            </form><br>");
            }
        }
    ?>
</div>

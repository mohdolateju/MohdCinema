<?php require_once("application/views/pageComp/TopHeader.php")?>
<title>404 Error :: Mohammed's Cinema</title>
    <?php session_start();?>
<?php require_once("application/views/pageComp/BottomHeader.php")?>
<?php require_once("application/views/pageComp/MainMenu.php")?>
<?php require_once("application/views/pageComp/ExtraMenu.php")?>
<section id="body">
    <section id="movies">
        <?php
        $ecq="\"";
        print("<article
                                    class=$ecq"."movie"."$ecq style= $ecq display: inline;$ecq>
                               <img id=$ecq movie $ecq alt= $ecq Error Image $ecq
                                    src=$ecq images/404.jpg $ecq
                                    width=$ecq 294 $ecq height=$ecq 452 $ecq/>

                               <div style=$ecq width:600px; padding-left: 2%; padding-top: 2%;text-align: center;$ecq>
                                     <span class=$ecq detail $ecq>Error:</span> $heading <br/><br/>
                                     <br/><br/>
                                     <br/><br/>
                                     <span class=$ecq detail $ecq>Description:</span>
                                      Sorry Seems This Page Is Missing, Don't Worry We'll Try to Find it.<br/>
                                      Feel Free To Follow The Links To Other Pages
                                     <br/><br/>

                               </div>

                                </article>\n");

        ?>
        <noscript>Please Turn On Your Javascript To View The Content Of This Page</noscript>
    </section>
</section>
<?php //$heading $message
require_once("application/views/pageComp/EndPage.php")?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Search Result</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
    <script src="<?=base_url()?>design/js/jquery-1.8.3.js"></script>
</head>
<script>

    $(document).ready(function(){
        $(".deletebutton").click(function(){
            return confirm("Are you sure you want to delete Book?");
        });
    });
</script>
    <body>
    <div id="wrap">
        <div class="header">


            <?php $this->load->helper('html');?>
            <?php $this->load->helper('url');?>
            <?php
                    //Algorithm for calculating the number of items in a the cart if session exists for a costumer
                    if(($_SESSION['type']=="costumer")){
                        print("<div id=\"menu\" style=\"width: 900px\">
                                    <ul style=\"padding-left:17%\">
                                        <li><a href=\"Home\">Home</a></li>
                                        <li><a href=\"BrowseBooks\">Browse Books</a></li>
                                        <li><a href=\"EditCart\">EditCart</a></li>
                                        <li><a href=\"Search\">Search Book</a></li>
                                        <li><a href=\"Checkout\">Check Out</a></li>
                                        <li><a href=\"LogOut\">Log Out</a></li>
                                     </ul>
                                </div></div>");

                        static $totalquantity=0;
                        static $totalcost=0;
                        static $booknum=0;
                        //Adds up all the number of books, totalcost and the total quantity of books
                        foreach($_SESSION as $cart){
                            if($cart==$_SESSION['userid']||$cart==$_SESSION['type']){
                                //Do not iterate if the content of the global session is the user information
                            }
                            else{
                                $totalquantity+=(int)$cart['quantity'];
                                $totalcost+=((int)$cart['cost']*(int)$cart['quantity']);
                                $booknum++;
                            }
                        }
                        //Print out all the information about the cart and links for a Logged In user
                        print("<div class=\"cartinfo\">
                        Books = $booknum
                        Total Book Quantity = $totalquantity
                        Total Cost = $totalcost AED
                               </div>");
                    }
                    //Print  links for a Logged In Admin if logged in
                    else if(($_SESSION['type']=="admin")){
                        print("<div id=\"menu\" style=\"width: 900px\">
                                <ul style=\"padding-left:20%\">
                                    <li><a href=\"Home\">Home</a></li>
                                    <li><a href=\"EditBooks\">Edit Books</a></li>
                                    <li><a href=\"UpdateAuthor\">Update Author</a></li>
                                    <li><a href=\"Search\">Search Books</a></li>
                                    <li><a href=\"LogOut\">Log Out</a></li>
                                 </ul>
                                    </div>
                                    </div>");
                    }
                    //Display links if user is not logged in
                    else{
                        print("<div id=\"menu\">
                        <ul style=\"padding-left:37%\">
                            <!--User Links using the Codeigniter url helper -->
                            <li><a href=\"Home\">Home</a></li>
                            <li><a href=\"Register\">Register</a></li>
                            <li><a href=\"BrowseBooks\">Browse Books</a></li>
                            <li><a href=\"Search\">Search Books</a><br></a></li>
                        </ul>
                    </div>
                </div>");
                    }
            ?>
            <div class="center_contents">
                <label class="title" style="padding-left: 30%">
                    <?php echo "Hello Welcome to Search Result Page";?></label><br> <br>
                <center>
                    <label class="searcherror"><?php echo "Search For ".ucfirst($searchtype).",   "."Search term =\"".$searchterm."\""?>
                </label></center><br> <br>
            <?php
                //If Books exist
                if(!empty($books)) {
                    //Iterate through the books and display results
                    foreach ($books as $details) {
                        print("<div class=\"book\">");
                        $bookimage = $details['book_id'] . $details['lastname'];
                        $image = array('src' => "book_images/{$bookimage}.jpg", 'width' => '120',
                                       'height' => '171', 'align' => 'right');
                        echo "<a href=\"" . site_url("BookDetail")."?book=".$details['book_id']."\">
                                    <span style=\"right:0px;\">".img($image)."</span></a>";
                        print("<div style=\"position:relative; width:628px; height:28px; top:5px\"" . ">
                                    <b class=\"bkdetail\">Title:</b> {$details['title']}
                                    <b class=\"bkdetail\">Author:</b> {$details['firstname']} {$details['lastname']}
                                    <b class=\"bkdetail\">Subject:</b> {$details['subject']}
                                    <b class=\"bkdetail\">Cost:</b> {$details['cost']}AED
                              </div>");
                        print("<div style=\"position:relative; width:629px; height:98px; top:15px;
                                    overflow: hidden;\"".">
                                    <b class=\"bkdetail\">Description:</b> {$details['description']}</div>");
                        print("<div style=\"position:relative; width:400px; height:22px; top:25px;\"" . ">
                                  <a href=\"".site_url("BookDetail")."?book=".$details['book_id']."\"
                                  class=\"costbutton\">Book Details</a>
                                  ");

                            //Display Links if user is an admin
                            if(($_SESSION['type']=="admin")){
                                print("&nbsp<a href=\"".site_url("UpdateBook")."?book=".$details['book_id']."
                             \" class=\"costbutton\" style='margin:2px'>"."Update Book</a>");
                print("&nbsp<a href=\"".site_url("DeleteBook")."?book=".$details['book_id']."\"
                              class=\"deletebutton\" style='margin:2px'>"."Delete Book</a></div> ");

                            }else{echo"</div>";}

                        print("</div><p>&nbsp;</p>");
                    }
                }
                //If No Books are Available Display Message
                else{
                        echo "<center>No Books Found</center>";
                    }
            ;?>
   </div>
    <div id="footer">

        <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
        <label class="copyright">Created by Mohammed.B.Olateju</label>
    </div>
   </div>
</body>
</html>
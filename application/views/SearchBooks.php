<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Books Search</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
</head>
<body>
<?php $this->load->library('form_validation');?>
<div id="wrap">
    <div class="header">



<?php $this->load->helper('url');?>


<?php
        //Algorithm for calculating the number of items in a the cart if session exists for a costumer
        if(($_SESSION['type']=="costumer")){

            print("<div id=\"menu\" style=\"width: 900px\">
            <ul style=\"padding-left:17%\">
                <li><a href=\"Home\">Home</a></li>
                <li><a href=\"BrowseBooks\">Browse Books</a></li>
                <li><a href=\"EditCart\">EditCart</a></li>
                <li  class=\"selected\"><a href=\"Search\">Search Book</a></li>
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
                </div></div>");
        }
        //Display links if user is not logged in
        else{
            print("<div id=\"menu\">
                        <ul style=\"padding-left:37%\">
                            <!--User Links using the Codeigniter url helper -->
                            <li><a href=\"Home\">Home</a></li>
                            <li><a href=\"Register\">Register</a></li>
                            <li><a href=\"BrowseBooks\">Browse Books</a></li>
                            <li  class=\"selected\"><a href=\"Search\">Search Books</a><br></a></li>
                        </ul>
                    </div>
                </div>");
        }
?>
        <div class="center_contents">
            <label class="title" style="padding-left: 36%">
                <?php echo "Hello Welcome to Book Search";?></label>

        <div class="contact_form" style="margin-left: 12%">

            <center><label class="title">Search Book</label></center><br>
            <center><?php
            //Form Used to Search for Books
            echo form_error('searchvalue');
            ?></center>

        <form name="Search" method="post" action="<?php echo site_url("Result");?>">
            <p>
              <select name="searchtype" id="select" class="button" style="width: auto;">
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="subject">Subject</option>
                <option value="description">Description</option>
              </select>
              <input name="searchvalue" type="text" id="searchvalue"
                     value="<?php echo set_value('searchvalue'); ?>"
                     size="70"/>
                <input type="submit" class="button" value="Search"/>
            </p>
        </form>
            </div>
        </div>

        <div id="footer">

            <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
            <label class="copyright">Created by Mohammed.B.Olateju</label>
        </div>

    </div>
</body>
</html>
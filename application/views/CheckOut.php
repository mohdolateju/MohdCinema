<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>CheckOut</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
</head>
<body>
<div id="wrap">
    <div class="header">
        <div id="menu">
            <ul style="padding-left:37%">
                <!--User Links using the Codeigniter url helper -->
                <li><a href="<?php echo site_url("Home");?>">Login</a></li>
                <li><a href="<?php echo site_url("Register");?>">Register</a></li>
                <li><a href="<?php echo site_url("BrowseBooks");?>">Browse Books</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a><br></a></li>
            </ul>
        </div>
    </div>
        <!--Loading Helper Libraries-->
        <?php $this->load->helper('html');?>
        <?php $this->load->helper('url');?>

        <?php
                //Adds up all the number of books, totalcost and the totalquantity of books
                static $totalquantity=0;
                static $totalcost=0;
                static $booknum=0;
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
                //Print out all the information about the cart for a Logged In user
                print("<div class=\"cartinfo\" style='
                                                    padding-top: 10px;
                                                    padding-bottom: 9px;
                                                    padding-left: 22%;
                                                    font-size: medium;
                                                    '>
                        Books = $booknum
                        Total Book Quantity = $totalquantity
                        Total Cost = $totalcost AED
                        </div>");
                print("<div class=\"center_contents\">
                        <label class=\"title\" style=\"padding-left: 15%\">
                        You've Checked Out Thanks For Coming to Mohammeds Bookstore!!!!</label> <br>
                        <label class=\"title\" style=\"padding-left: 37%\">
                        Please, Do Come Back!!!!</label><br/>");
                //Displays Each content of the Cart
                foreach($_SESSION as $cart){
                    if($cart==$_SESSION['userid']||$cart==$_SESSION['type']){
                        //Do not display the content if is is part of the user information
                    }
                    else{
                          print("<div class=\"book\">");
                          $bookimage = $cart['book_id'] . $cart['lastname'];
                          $image = array('src' => "book_images/{$bookimage}.jpg",
                                         'width' => '120', 'height' => '171', 'align' => 'right');
                          echo "<span style=\"right:0px;\">" . img($image) . "</span>";

                          print("<div style=\"position:relative; width:628px; height:28px; top:5px\"" . ">
                                    <b>Title:</b> {$cart['title']}
                                    <b>Author:</b> {$cart['firstname']} {$cart['lastname']}
                                    <b>Cost:</b> {$cart['cost']}AED
                                    <b>Subject:</b> {$cart['subject']}
                                </div>");

                          print("<div style=\"position:relative; width:629px; height:98px; top:15px;
                                        overflow: hidden;\"" . "><b>Description:</b> {$cart['description']}
                                </div>
                                <div style='position:relative;  height:22px; top:25px;'>
                         <span class='spanform'>

                                    <label class=\"bkdetail\">Quantity:<b> {$cart['quantity']}</b></label>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <label class=\"bkdetail\">Cost:<b> {$cart['cost']}</b></label>
                          </span>

                           </div>");
                          print("</div><p>&nbsp;</p>");
                    }
                 }

                //removes all session variables
                session_unset();
        ?>
    </div>
    <div id="footer">

        <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
        <label class="copyright">Created by Mohammed.B.Olateju</label>
    </div>
</div>
</body>
</html>
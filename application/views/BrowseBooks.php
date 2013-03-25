<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Books</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
</head>
<body>
<div id="wrap">
    <div class="header">
<?php
    //Algorithm for calculating the number of items in a the cart if session exists for a costumer
    if(($_SESSION['type']=="costumer")){
        
        //Print out all the information about the cart and links for a Logged In user
        print("<div id=\"menu\" style=\"width: 900px\">
            <ul style=\"padding-left:17%\">
                <li><a href=\"Home\">Home</a></li>
                <li class=\"selected\"><a href=\"BrowseBooks\">Browse Books</a></li>
                <li><a href=\"EditCart\">EditCart</a></li>
                <li><a href=\"Search\">Search Book</a></li>
                <li><a href=\"Checkout\">Check Out</a></li>
                <li><a href=\"LogOut\">Log Out</a></li>
             </ul>
                </div></div>");

        static $totalquantity=0;
        static $totalcost=0;
        static $booknum=0;
        //Adds up all the number of books, totalcost and the totalquantity of books
        foreach($_SESSION as $book){
            if($book==$_SESSION['userid']||$book==$_SESSION['type']){
                //Do not iterate if the content of the global session is the user information
            }
            else{
                $totalquantity+=(int)$book['quantity'];
                $totalcost+=((int)$book['cost']*(int)$book['quantity']);
                $booknum++;
            }
        }
        //Print out all the information about the cart and links for a Logged In user
        print("<div class=\"cartinfo\">
                        Books = $booknum
                        Total Book Quantity = $totalquantity
                        Total Cost = $totalcost AED
                   </div>");

    }else if(!isset($_SESSION['type'])){
            print("<div id=\"menu\">
            <ul style=\"padding-left:37%\">
                <!--User Links using the Codeigniter url helper -->
                <li><a href=\"Home\">Home</a></li>
                <li><a href=\"Register\">Register</a></li>
                <li class=\"selected\"><a href=\"BrowseBooks\">Browse Books</a></li>
                <li><a href=\"Search\">Search Books</a><br></a></li>
            </ul>
        </div>
    </div>");
        }?>
        

    <div class="center_contents">
        <?php $this->load->helper('html');?>
        <?php $this->load->helper('url');?>

        <label class="title" style="padding-left: 27%">
            <?php echo "Welcome Please Browse the books below";?></label> <br/>
        <?php
            //Iterated through all the books and Display the information for each
            foreach ($books as $book) {
                print("<div class=\"book\">");

                $bookimage = $book['book_id'] . $book['lastname'];
                $image = array('src' => "book_images/{$bookimage}.jpg", 'width' => '120',
                               'height' => '171', 'align' => 'right');

                echo "<a href=\"" . site_url("BookDetail") . "?book=" . $book['book_id'] . "\">
                        <span style=\"right:0px;\">" . img($image) . "</span>
                      </a>";

                print("<div style=\"position:relative; width:628px; height:28px; top:5px\"" . ">
                            <b class=\"bkdetail\">Title:</b> {$book['title']}
                            <b class=\"bkdetail\">Author:</b> {$book['firstname']} {$book['lastname']}
                            <b class=\"bkdetail\">Cost:</b> {$book['cost']}AED
                            <b class=\"bkdetail\">Subject:</b> {$book['subject']}
                       </div>");

                print("<div style=\"position:relative; width:629px; height:98px; top:15px; overflow: hidden;\"" . ">
                            <b class=\"bkdetail\">Description:</b> {$book['description']}
                       </div>");

                print("<div style=\"position:relative; width:89px; height:22px; top:25px;\"" . ">
                        <a href=\"" . site_url("BookDetail") . "?book=" . $book['book_id'] . "\"
                        class=\"costbutton\">Book Details</a>
                        </div>");

                print("</div><p>&nbsp;</p>");

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
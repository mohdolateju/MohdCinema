<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Edit Cart</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
</head>
<body>
<div id="wrap">
    <div class="header">
        <div id="menu" style="width: 900px">
            <ul style="padding-left: 17%;%">
                <!--User Links using the Codeigniter url helper -->
                <li><a href="Home">Home</a></li>
                <li><a href="BrowseBooks">Browse Books</a></li>
                <li class="selected"><a href="EditCart">EditCart</a></li>
                <li><a href="Search">Search Book</a></li>
                <li><a href="Checkout">Check Out</a></li>
                <li><a href="LogOut">Log Out</a></li>
            </ul>
        </div>
    </div>


    <!--Loading Helper Libraries-->
    <?php $this->load->helper('html');?>
    <?php $this->load->helper('url');?>



    <?php
        static $totalquantity=0;
        static $totalcost=0;
        static $booknum=0;

        //Adds up all the number of books, totalcost and the totalquantity of books
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

        print("<div class=\"cartinfo\">
                        Books = $booknum
                        Total Book Quantity = $totalquantity
                        Total Cost = $totalcost AED
                   </div>");

        print("<div class=\"center_contents\">");
        //Print out all the information about the cart and links for a Logged In user
        echo "<label class=\"title\" style=\"padding-left: 45%\">Edit Cart</label>";

         //Displays Each content of the Cart
         foreach($_SESSION as $cart){
              if($cart==$_SESSION['userid']||$cart==$_SESSION['type']){
                  //Do not display the content if is is part of the user information
              }
              else{
                  print("<div class=\"book\">");
                  $bookimage = $cart['book_id'] . $cart['lastname'];
                  $image = array('src' => "book_images/{$bookimage}.jpg", 'width' => '120',
                                 'height' => '171', 'align' => 'right');
                  echo "<a href=\"" . site_url("BookDetail") . "?book=" . $cart['book_id'] . "\">
                        <span style=\"right:0px;\">" . img($image) . "</span></a>";

                  print("<div style=\"position:relative; width:628px; height:28px; top:5px\"" . ">
                            <b class=\"bkdetail\">Title:</b> {$cart['title']}
                            <b class=\"bkdetail\">Author:</b> {$cart['firstname']} {$cart['lastname']}
                            <b class=\"bkdetail\">Cost:</b> {$cart['cost']}AED
                            <b class=\"bkdetail\">Subject:</b> {$cart['subject']}
                        </div>");

                  print("<div style=\"position:relative; width:629px; height:98px; top:15px; overflow: hidden;\"" . ">
                            <b class=\"bkdetail\">Description:</b> {$cart['description']}
                         </div><br/>
                         <span class='spanform'>
                         <span class='spanform'>
                               <form name=\"cart\" method=\"post\" action=\"UpdateCart\">
                                    <label class=\"bkdetail\">Current Quantity:<b> {$cart['quantity']}</b></label>
                                    <b>New Quantity</b> <select name=\"quantity\" class='button' style='width: auto;'>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                      </select>
                                    <input type=\"hidden\" name=\"book\" value=\"{$cart['book_id']}\"/>
                                    <input type=submit class='button' style='width: auto;' value=\"Update Quantity\"/>
                               </form>
                          </span>
                          <span class='spanform'>
                               <form name=\"removeitem\" method=\"post\" action=\"RemoveItem\">
                                    <input type=\"hidden\" name=\"book\" value=\"{$cart['book_id']}\"/>
                                    <input type=\"hidden\" name=\"quantity\" value=\"{$cart['quantity']}\"/>
                                    <input type=submit class='button' style='width: auto;' value=\"Remove Item\"/>
                               </form>
                           </span>
                           </span>");

                  print("</div><p>&nbsp;</p>");

                  }
         }
    ?>
    </div>
    <div id="footer">

        <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
        <label class="copyright">Created by Mohammed.B.Olateju</label>
    </div>
    </div>
</body>
</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Book Details</title>
    <!--Loading Url  Libraries -->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
    <script src="<?=base_url()?>design/js/jquery-1.8.3.js"></script>
</head>
<body>
<script>

    $(document).ready(function(){
        $(".deletebutton").click(function(){
            return confirm("Are you sure you want to delete Book?");
        });
    });
</script>
<div id="wrap">
    <div class="header">
        <?php
        //If the logged in user is an admin display admin specific links
        if($_SESSION['type']=='admin'){

            print("<div id=\"menu\" style=\"width: 900px\">
            <ul style=\"padding-left:20%\">
                <li><a href=\"Home\">Home</a></li>
                <li><a href=\"EditBooks\">Edit Books</a></li>
                <li><a href=\"UpdateAuthor\">Update Author</a></li>
                <li><a href=\"Search\">Search Books</a></li>
                <li><a href=\"LogOut\">Log Out</a></li>
             </ul>
                </div></div>");

            //If the logged in user is a costumer, it shows costumer specific links and calculate the content of the cart
        }else if($_SESSION['type']=='costumer'){
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

        }else{
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
        <label class="title" style="padding-left: 40%">
            <?php echo "Book Details";?></label>
            <?php $this->load->helper('html');?>
            <?php $this->load->helper('url');?>
            <?php
                    //gets the Image for a Particular book and display it
                    print("<div style=\"top: 20px;
                                width: 860px;
                                color:white;
                                min-height: 400px;
                                box-shadow: 3px 3px 5px 2px #E6B1B1;
                                background-color: #1E8C99;
                                border-radius: 12px;
                                line-height: 1.9;
                                padding: 10px 5px 5px 5px;\">");
                    $bookimage = $book_id . $lastname;
                    $image = array('src' => "book_images/{$bookimage}.jpg", 'width' => '311', 'height' => '391', 'align' => 'right');
                    echo "<span id=\"bkdetailimg\"style=\"right:0px;\">" . img($image) . "</span>";


        //Display the details of the book
        print("<div style=\"position:relative; width:520px; height:28px; top:5px; padding:5px\"" . ">
                    <b class=\"bkdetail\">Title:</b> {$title}
                    <b class=\"bkdetail\">Author:</b> {$firstname} {$lastname}
                    <b class=\"bkdetail\">Publisher:</b> {$publisher}
                    <b class=\"bkdetail\">Cost:</b> {$cost}AED
                    <b class=\"bkdetail\">Subject:</b> {$subject} <b>Stock:</b> {$stock}</div>");
        print("<div style=\"position:relative; width:520px; min-height:98px; top:25px; padding:5px\"" . ">
                <b class=\"bkdetail\">Description:</b> {$description}</div>");
            //If the session exists
            if(isset($_SESSION)){
                    //And the Logged person is a costumer, Allow the costumer to Add to the book to Cart
                    if($_SESSION['type']=='costumer'){
                            print("<form name=\"cart\" method=\"post\" action=\"AddtoCart\" style=\"padding: 5px;\">
                            <br>
                            Quantity: <select name=\"quantity\" class='button' style='width: auto'>
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
                              <input type=\"hidden\" name=\"book\" value=\"{$book_id}\"/>
                              <input type=submit class='button' style='width: auto' value=\"Add to Cart\"/>
                            </form><br>");
                    //If Logged in user is an admin allow the admin to delete and update the book
                    }else if($_SESSION['type']=='admin'){
                        print("<br><br><a href=\"".site_url("UpdateBook")."?book=".$book_id."\"
                                class=\"costbutton\" style='margin:2px'>"."Update Book</a>");
                        print("&nbsp<a href=\"".site_url("DeleteBook")."?book=".$book_id."\"
                                class=\"deletebutton\" style='margin:2px'>"."Delete Book</a><br><br>");
                    }else{echo "<br><br>";}
                print("</div>");
            }else{
                echo "<br><br>";
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
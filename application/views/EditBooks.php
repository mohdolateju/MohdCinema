<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Edit Books</title>
    <!--Loading the url helper library-->
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
        <div id="menu" style="width: 900px;">
            <ul style="padding-left: 20%">
                <!--User Links using the Codeigniter url helper -->
                <li><a href="<?php echo site_url("Home");?>">Home</a></li>
                <li class="selected"><a href="<?php echo site_url("EditBooks");?>">Edit Books</a></li>
                <li><a href="<?php echo site_url("UpdateAuthor");?>">Update Author</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a></li>
                <li><a href="<?php echo site_url("LogOut");?>">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="center_contents">
        <label class="title" style="padding-left: 32%">
            <?php echo "Welcome Please Browse the books below";?></label>
        <?php $this->load->helper('html');?>


         <!--Delete Success Message-->
        <?php if(isset($delsuccess)){echo "<br/><div class='searcherror'>".$delsuccess."</div>";}else{};?>
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

                //Admin Specific Links
                print("<div style=\"position:relative; width:500px; height:22px; top:25px;\">
                            <a href=\"".site_url("BookDetail")."?book=".$book['book_id']."\"
                            class=\"costbutton\" style='margin:2px'>"."Book Details</a>");
                print("&nbsp<a href=\"".site_url("UpdateBook")."?book=".$book['book_id']."
                             \" class=\"costbutton\" style='margin:2px'>"."Update Book</a>");
                print("&nbsp<a href=\"".site_url("DeleteBook")."?book=".$book['book_id']."\"
                               class=\"deletebutton\" style='margin:2px'>"."Delete Book</a>

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
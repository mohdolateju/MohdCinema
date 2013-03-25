<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Update Authors Details</title>
    <!--Loading the url helper library-->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
    <script src="<?=base_url()?>design/js/jquery-1.8.3.js"></script>
</head>
<body>
<script>

    $(document).ready(function(){
        $("#delete").click(function(){
            return confirm("Are you sure you want to delete Author?");
        });
    });
</script>
<div id="wrap">
    <div class="header">
        <div id="menu" style="width: 900px;">
            <ul style="padding-left: 20%">
                <!--User Links using the Codeigniter url helper -->
                <li><a href="<?php echo site_url("Home");?>">Home</a></li>
                <li><a href="<?php echo site_url("EditBooks");?>">Edit Books</a></li>
                <li class="selected"><a href="<?php echo site_url("UpdateAuthor");?>">Update Author</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a></li>
                <li><a href="<?php echo site_url("LogOut");?>">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="center_contents">
        <label class="title" style="padding-left: 37%">
            Update Authors Details<br/></label>
        <!--Loading the Form Validation Library -->
        <?php $this->load->library('form_validation'); ?>


        <div class="contact_form" style="margin-left: 29%">
        <!--Success Message if Updating Author Succeeds-->
        <?php if(isset($success)){echo $success;}else{};?>

        <!--Form for getting authors from the database-->
        <form method="post" action="SearchAuthor">
            <div>Search By Author ID
            <select name="authorid" class="button">
            <?php

                //gets the id of each author from the list of author ids
                foreach($authorids as $authorid){
                    if(isset($author_id)){

                        //makes sure the id that was searched for by the user is the selected one from the options
                        if($author_id==$authorid['author_id']){
                            print("<option selected>{$authorid['author_id']}</option>");
                        }else{
                            print("<option>{$authorid['author_id']}</option>");
                        }
                    }else{
                        print("<option>{$authorid['author_id']}</option>");
                    }
                }
             ?>
            </select>
            <input type="submit" class="button" style="width: auto" value="Search Author"/>
            </div>
        </form>

        <?php
            //form for Updating Author after the Author Search succeeds
            if(isset($firstname)&&isset($lastname)){
                print("<form method=\"post\" action=\"UpdateAuthorDetails\">
                        <div class='form_row'>".form_error('authorfname')."
                        Firstname: <input type=\"text\" style=\"width: 145px;\" name=\"authorfname\"
                        id=\"authorfname\" value=\" $firstname \"></div> ");

                print("<div class='form_row'>
                       ".form_error('authorfname')."
                       Lastname: <input type=\"text\" style=\"width: 145px;\" name=\"authorlname\"
                       id=\"authorlname\" value=\" $lastname \"></div>
                      <input type=\"hidden\" name=\"author_id\" id=\"authorid\" value=\"$author_id\">");


                print("<br>
                <span><input type=\"submit\" class='button' style='width: auto'
                                    value=\"Update Details\"/></span>");
                print("</form>");

                print("<br><form method=\"post\" action=\"DeleteAuthor\" >
                        <input type=\"hidden\" name=\"author_id\" id=\"authorid\" value=\"$author_id\">
                        <span><input type=\"submit\" id=\"delete\" class='button' style='width: auto'
                         value=\"Delete Author\"</span>
                        </form>");
            }
        ?>
        </div>
    </div>
<div id="footer">
    <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
    <label class="copyright">Created by Mohammed.B.Olateju</label>
</div>
</div>
</body>
</html>
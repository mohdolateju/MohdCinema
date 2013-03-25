<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Admin Page</title>
    <!--Loading the url helper library-->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>

</head>
<body>
    <div id="wrap">
        <div class="header">
            <div id="menu" style="width: 900px;">
                <ul style="padding-left: 20%">
                    <!--User Links using the Codeigniter url helper -->
                    <li class="selected"><a href="<?php echo site_url("Home");?>">Home</a></li>
                    <li><a href="<?php echo site_url("EditBooks");?>">Edit Books</a></li>
                    <li><a href="<?php echo site_url("UpdateAuthor");?>">Update Author</a></li>
                    <li><a href="<?php echo site_url("Search");?>">Search Books</a></li>
                    <li><a href="<?php echo site_url("LogOut");?>">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="center_contents">
            <label class="title" style="padding-left: 32%">
                    <?php echo "Welcome to Admin Page";?>
            </label><br><br>

            <!--Admin User Details-->
            <div class="contact_form"  style="margin-left: 10%; color: white">
                <label class="title"><?php echo "{$firstname} {$lastname}'s " ?> Details</label><br/>
                    <b>Firstname:</b> <?php echo $firstname?> <br/>
                    <b>Lastname:</b> <?php echo $lastname?>   <br/>
                    <b>Email:</b> <?php echo $email?><br/>
                    <b>Admin ID:</b> <?php echo $user_id?><br/>
                    <b>Address:</b> <?php echo $address?><br/>
            </div>

            <!--Add Author Form if author exists message is show if new author is created message is also shown-->
            <div class="contact_form" style="margin-left: 3%;min-width: 220px;">
                <label class="title">Add New Author</label><br>
                    <?php if(isset($authorexists)){echo $authorexists;}else{};?>
                    <?php if(isset($authorcreated)){echo $authorcreated;}else{};?>
                <form name="addauthor" method="post" action="AddNewAuthor">

                        <div class="form_row">
                            Firstname:
                            <?php echo form_error('firstname'); ?>
                            <input type="text" name="firstname" style="width: 145px;"
                                   value="<?php echo set_value('firstname'); ?>"/>
                        </div>

                        <div class="form_row">
                            Lastname:
                            <?php echo form_error('lastname'); ?>
                            <input type="text" name="lastname" style="width: 145px;"
                                   value="<?php echo set_value('lastname'); ?>"/>
                        </div>

                        <?php print("<input type=\"hidden\" name=\"userlname\" value=\"".$firstname."\"/>
                                     <input type=\"hidden\" name=\"userfname\" value=\"$lastname\"/><br>")?>

                        <div style="clear: both">
                            <input type="reset" class="button" value="Reset"/>
                            <input type="submit" class="button"
                                   style="margin-left: 40px; width :auto;" value="Add Author"/>
                        </div>

                </form>
                <br>
                <div><a href="UpdateAuthor" class="costbutton">Update Authors</a></div>
            </div>

            <!--Add Book Form if book exists message is shown if new book is created message is also shown-->
            <div class="contact_form" style=" margin: 5% 0 0 10%;">
                <Label class="title">Add New Book</label>

                <?php if(isset($bookadded)){echo $bookadded;}else{};?>
                <?php if(isset($uploaderror)){echo $uploaderror;}else{};?>

                <form name="addnewbook" method="post" action="AddNewBook" enctype="multipart/form-data">
                        <div class="form_row">Title:
                            <?php echo form_error('title');?>
                            <input type="text" name="title" id="title"
                                   value="<?php echo set_value('title'); ?>" />
                        </div>

                        <div class="form_row">
                            Author:
                            <?php echo form_error('author'); ?>
                            <select name="author" class="button" style="margin-left: 23%;width: auto;">
                                <?php
                                //Loads a list of the authors
                                foreach($authors as $author){
                                    print("<option>{$author['firstname']}"." "."{$author['lastname']}</option>");
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form_row">
                            Publisher:
                            <?php echo form_error('publisher'); ?>
                            <input type="text" name="publisher" id="publisher"
                                   value="<?php echo set_value('publisher'); ?>"/>
                        </div>

                        <div class="form_row">
                            Subject:
                            <?php echo form_error('subject'); ?>
                            <input type="text" name="subject" id="subject"
                                   value="<?php echo set_value('subject'); ?>"/>
                        </div>

                        <div style="color: white">
                            Book Cover:
                            <?php echo form_error('bookcover'); ?>
                            <input type="file" name="bookcover" style=" width: 175px;">
                        </div>

                        <div class="form_row">
                            Cost:
                            <?php echo form_error('cost'); ?>
                            <input type="text" name="cost" id="cost" size="3"
                                   value="<?php echo set_value('cost'); ?>"> AED
                        </div>

                        <div class="form_row">
                            Stock(No):
                            <?php echo form_error('stock'); ?>
                            <input type="text" name="stock" id="stock" size="3"
                                   value="<?php echo set_value('stock'); ?>">
                        </div>

                        <div class="form_row">
                            Description:
                            <?php echo form_error('description'); ?>
                            <textarea name="description" id="description" cols="17"
                                  rows="5"><?php echo set_value('description'); ?>
                            </textarea>
                        </div>


                        <?php print("<input type=\"hidden\" name=\"userlname\" value=\"".$firstname."\"/>
                                     <input type=\"hidden\" name=\"userfname\" value=\"$lastname\"/>")?>

                        <div style="clear:both">
                            <input type="reset" class="button" value="Reset"/>
                            <input type="submit" class="button"
                                   style="margin-left: 20%; width: auto;" value="Add Book"/>
                        </div>
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
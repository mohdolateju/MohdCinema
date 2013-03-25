<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Update Book Details</title>
    <!--Loading the url helper library-->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/
</head>
<body>
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
        <?php echo "Update Book Details";?><br></label>
        <!--Loading the Libraries for the Page-->
        <?php $this->load->helper(array('html','url','form'));?>
        <div class="contact_form" style="margin-left: 24%;">
        <!--Status Messages on Form Submission-->
        <?php if(isset($success)){echo $success;}else{};?>
        <?php if(isset($uploaderror)){echo $uploaderror;}else{};?>
            <!--Start of Form-->
            <form name="updatebook" method="post" action="UpdateBookDetails" enctype="multipart/form-data">
                <div class="form_row">Title:
                    <?php echo form_error($title); ?>
                <input type="text" name="title" id="title" size="40" value="<?php echo $title; ?>" />                
                </div>
                <div class="form_row">
                Author:
                    <?php echo form_error('author'); ?>
                <select name="author" class="button" style="margin-left: 140px; width: auto" >
                    <?php
                    //Loading all the Authors
                    foreach($authors as $author){
                        if ($author['lastname']==$lastname){
                            print("<option selected>{$author['firstname']}"." "."{$author['lastname']}</option>");
                        }else{
                            print("<option>{$author['firstname']}"." "."{$author['lastname']}</option>");
                            }
                    }
                    ?>
                </select>
                </div>

                <div class="form_row">
                Publisher:
                    <?php echo form_error('publisher'); ?>
                <input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>"/>
                        
                </div>

                <div class="form_row">
                Subject:
                    <?php echo form_error('subject'); ?>
                <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>"/>
                        
                </div>

                <div>
                New Book Cover(Optional):
                    <?php echo form_error('bookcover'); ?>
                <input type="file" name="bookcover" style=" width: 175px;">
                </div>

                <div class="form_row">
                Cost:
                    <?php echo form_error('cost'); ?>
                <input type="text" name="cost" id="cost" size="3" value="<?php echo $cost; ?>"> AED<br/>

                </div>

                <div class="form_row">Stock(No):
                    <?php echo form_error('stock'); ?>
                <input type="text" name="stock" id="stock" value="<?php echo $stock; ?>" size="3"><br/>

                </div>

                <div class="form_row">
                Description:
                <textarea name="description" id="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                <?php echo form_error('description'); ?><br/>
                </div>
                <br>
                <div style="clear:both">
                <input type="hidden" name="bookid" value="<?php echo $book_id ?>"/>

                <input type="reset" value="Reset" class="button"/>
                    <input type="submit" class="button" style="margin-left: 45%;" value="Update"/>
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
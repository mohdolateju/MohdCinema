<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>
        Register
    </title>
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
                <li><a href="<?php echo site_url("Home");?>">Home</a></li>
                <li class="selected"><a href="<?php echo site_url("Register");?>">Register</a></li>
                <li><a href="<?php echo site_url("BrowseBooks");?>">Browse Books</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a></a></li>
            </ul>
        </div>
    </div>

    <div class="center_contents">
        <div class="title" style="margin-left: -25px">
            <center><?php echo "Please Enter Your Details to Register";?></center>
            <!--Form Validation Error Messages Method -->
        </div>
    <div class="contact_form">
<!--Register Form For New Costumers With all the Required Field for a Costumer -->
<form name="register" method="post" action="RegisterAction">
        <div class="form_row">
        Firstname:<?php echo form_error('firstname'); ?>
        <input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>"/>
        </div>

        <div class="form_row">
        Lastname:
        <?php echo form_error('lastname'); ?>
        <input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>"/>
        </div>

        <div class="form_row">
        Email:
        <?php echo form_error('email'); ?>
        <input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"/>

        </div>

    <div class="form_row">
        Password:
        <?php echo form_error('password1'); ?>
        <input type="password" name="password1" id="password1">
        </div>

    <div class="form_row">
        Password:
        <?php echo form_error('password2');?>
        <input type="password" name="password2">
        </div>

        <div class="form_row">
        <label class="addresstext">Address:</label>
        <?php echo form_error('address'); ?>
        <textarea name="address" id="address" cols="25" rows="3"><?php echo set_value('address'); ?></textarea>
        </div>
        <input type="reset" class="button" value="Reset"/>
        <input type="submit" class="button" style="margin-left:145px" value="Submit"/>

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
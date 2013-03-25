<html xmlns="http://www.w3.org/1999/html">
<head>
    <!--Displaying the title According to the Users Firstname and Lastname-->
    <title>
        <?php echo "{$firstname} {$lastname}'s " ?> Details
    </title>
    <!--Loading the url helper library-->
    <?php $this->load->helper('url');?>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>design/css/style.css"/>
</head>
<body>
<div id="wrap">
    <div class="header">
        <div id="menu" style="width: 900px;">
            <ul style="padding-left: 17%">
                <!--User Links using the Codeigniter url helper -->
                <li class="selected"><a href="<?php echo site_url("Home");?>">Home</a></li>
                <li><a href="<?php echo site_url("BrowseBooks");?>">Browse Books</a></li>
                <li><a href="<?php echo site_url("EditCart");?>">EditCart</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a></li>
                <li><a href="<?php echo site_url("Checkout");?>">Check Out</a></li>
                <li><a href="<?php echo site_url("LogOut");?>">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="center_contents">
        <label class="title" style="padding-left: 37%">


            <?php echo "{$firstname} {$lastname}'s " ?> Details</label>

            <!--Links to other pages-->
            <div class="contact_form" style="margin-left: 36%;";>

                <!--Details of the User-->
               <label class="userdetails"> <b>Firstname:</b> <?php echo $firstname?></label><br/>
                <label class="userdetails"><b>Lastname: </b><?php echo $lastname?></label><br/>
                    <label class="userdetails"><b>Email:</b> <?php echo $email?></label><br/>
                        <label class="userdetails"><b>Costumer ID:</b> <?php echo $user_id?></label><br/>
                            <label class="userdetails"><b>Address:</b> <?php echo $address?></label><br/>
            </div>
        </div>
        <div id="footer">
            <a href="http://mohdolatejuaspire.wordpress.com">Blog: Life A Software Developer</a>
            <label class="copyright">Created by Mohammed.B.Olateju</label>
        </div>
    </div>
</body>
</html>
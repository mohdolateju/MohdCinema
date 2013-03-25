<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>
        Welcome to Mohammed's Bookstore
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
                <li class="selected"><a href="<?php echo site_url("Home");?>">Home</a></li>
                <li><a href="<?php echo site_url("Register");?>">Register</a></li>
                <li><a href="<?php echo site_url("BrowseBooks");?>">Browse Books</a></li>
                <li><a href="<?php echo site_url("Search");?>">Search Books</a><br></a></li>
            </ul>
        </div>
    </div>
    <div class="center_contents">
    <label class="title" style="padding-left: 27%">
    <?php echo "Welcome to Mohammed's Bookstore!!!";?></label>    <br/>

    <!--Loading Form  Libraries -->
    <?php $this->load->library('form_validation');?>

</p>
<div class="contact_form">
<center><label class="title">Login</label><br></center>
    <!--Message Displayed when userid and password combination is wrong  -->

        <?php if (isset($message)) {
                echo "<div class=\"error\">";
                echo "{$message} ";
                echo "</div>";
              } else {} ;
    //<!--Code to dispay Success Message and CostumerId of Newly Registered user -->

     if (isset($success) && isset($constumerid)) {
    echo "<div class=\"error\">
    {$success} Costumer ID is {$constumerid}.</div>";
}
else {} ;


        ?>

    <!--Login From Using CodeIgniters's Form Validation library Methods-->
    <form name="LoginUser" method="post" action="<?php echo site_url("LoginUser");?>">

        <div class="form_row">
            User ID:
            <?php echo form_error('userid'); ?>
            <input type="text" name="userid" id="userid" value="<?php echo set_value('userid'); ?>"/>
            <br/>
        </div>
        <div class="form_row">
            Password:
            <?php echo form_error('password'); ?>
            <input type="password" name="password" style="margin-left:15px" value=""/>
            <br/>
        </div>
            <input type="reset" class="button" value="Reset"/>
            <input type="submit" class="button" style="margin-left:105px" value="Submit"/>
        </p>
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
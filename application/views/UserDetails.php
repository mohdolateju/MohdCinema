<?php require_once("application/views/pageComp/TopHeader.php")?>
    <title>User Details :: Mohammed's Cinema</title>
<?php require_once("application/views/pageComp/BottomHeader.php")?>
<?php require_once("application/views/pageComp/MainMenu.php")?>
<?php require_once("application/views/pageComp/ExtraMenu.php")?>
    <section id="body" style="margin-top: 2%;margin-left: 35%;display: block;">
        <!--Details of the User-->
        User Details<br/><br/>
        <span class="detail">Firstname:</span> <?php echo $_SESSION['firstname']?><br/><br/>
        <span class="detail">Lastname:</span> <?php echo $_SESSION['lastname']?><br/><br/>
        <span class="detail">Email:</span> <?php echo $_SESSION['email']?><br/><br/>
        <span class="detail">Username:</span> <?php echo $_SESSION['username']?><br/><br/>
    </section>
<?php require_once("application/views/pageComp/EndPage.php")?>

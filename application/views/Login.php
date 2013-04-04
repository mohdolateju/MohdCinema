    <?php require_once("application/views/pageComp/TopHeader.php")?>
		<title>Login :: Mohammed's Cinema</title>
    <?php require_once("application/views/pageComp/BottomHeader.php")?>
    <?php require_once("application/views/pageComp/MainMenu.php")?>
    <?php require_once("application/views/pageComp/ExtraMenu.php")?>
        <section id="body" style="margin-top: 2%;margin-left: 40%;min-height: 450px;display: block;">
            <?php
            //Display Success Message if username variable is set in the controller
            if(!empty($username)) {
                echo "<span style=\"background-color:red;padding:0.2%;\">$success Username is $username</span>";
            }?>
            <form name="login" method="post" action="Login">
                <table >
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo set_value('username'); ?>"/>
                        </td>
                        <td><?php echo form_error('username'); ?></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" id="password"></td>
                        <td><?php echo form_error('password'); ?></td>
                    </tr>
                </table>
                <input type="reset" class="button" value="Reset"/>
                <input type="submit" class="button" style="margin-left:13%" value="Submit"/>
            </form>
		</section>
    <?php require_once("application/views/pageComp/EndPage.php")?>

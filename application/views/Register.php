    <?php require_once("application/views/TopHeader.php")?>
		<title>Welcome :: Mohammed's Cinema</title>
    <?php require_once("application/views/BottomHeader.php")?>
    <?php require_once("application/views/MainMenu.php")?>
    <?php require_once("application/views/ExtraMenu.php")?>
        <section id="body" style="margin-top: 2%;margin-left: 35%;min-height: 450px;">
            <form name="register" method="post" action="RegisterAction">
                <table >
                    <tr>
                        <td>Firstname:</td>
                        <td>
                            <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>"/>
                        </td>
                        <td><?php echo form_error('firstname'); ?></td>
                    </tr>

                    <tr>
                        <td>Lastname:</td>
                        <td>
                            <input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>"/>
                        </td>
                        <td><?php echo form_error('lastname'); ?></td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
                        </td>
                        <td><?php echo form_error('email'); ?></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password1" id="password1"></td>
                        <td><?php echo form_error('password1'); ?></td>
                    </tr>

                    <tr><td>Retype Password:</td>
                        <td><input type="password" name="password2" id="password2"></td>
                        <td><?php echo form_error('password2'); ?></td>
                    </tr>
                </table>
                <input type="reset" class="button" value="Reset"/>
                <input type="submit" class="button" style="margin-left:145px" value="Submit"/>
            </form>
		</section>
    <?php require_once("application/views/EndPage.php")?>

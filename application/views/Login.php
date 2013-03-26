    <?php require_once("application/views/TopHeader.php")?>
		<title>Login :: Mohammed's Cinema</title>
    <?php require_once("application/views/BottomHeader.php")?>
    <?php require_once("application/views/MainMenu.php")?>
    <?php require_once("application/views/ExtraMenu.php")?>
        <section id="body" style="margin-top: 2%;margin-left: 40%;min-height: 450px;display: block;">
            <?php echo $message ?>
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
    <?php require_once("application/views/EndPage.php")?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>AddAuthor</title>
</head>
<body>
<p><b>Add New Author</b>
</p>
<?php $this->load->helper('url');?>
<? echo validation_errors();?>
<form name="addauthor" method="post" action="AddNewAuthor">
    <p>Firstname:
        <input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>"/>
        <?php echo form_error('firstname'); ?><br/>
        Lastname:
        <input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>"/>
        <?php echo form_error('lastname'); ?><br/>
        <input type="reset" value="Reset"/><input type="submit" value="Submit"/>
</form>
</body>
</html>
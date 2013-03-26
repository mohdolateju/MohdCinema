<?php if(!$message=="A session had already been started - ignoring session_start()"){
echo "<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">";

echo "<h4>An Error was encountered</h4>";


echo "<p>Severity: <?php echo $severity; ?></p>";
echo "<p>Message:  <?php echo $message; ?></p>";
echo "<p>Filename: <?php echo $filepath; ?></p>";
echo "<p>Line Number: <?php echo $line; ?></p>";


echo "</div>";
    }?>
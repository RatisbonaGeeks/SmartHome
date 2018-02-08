<?php
    $verbindung = mysql_connect("localhost", "root") or die (mysql_error());
    mysql_select_db("SmartHome") or die (mysql_error());
    if ($_GET["on"] == 'y') {
    	mysql_query("UPDATE `light` SET `Status` = 'N' WHERE ID = '".$_GET["id"]."'");
    }
    else {
    	mysql_query("UPDATE `light` SET `Status` = 'Y' WHERE ID = '".$_GET["id"]."'");
    }
 	
    echo "<script type='text/javascript'>window.location.href = 'light.php';</script>";
?>
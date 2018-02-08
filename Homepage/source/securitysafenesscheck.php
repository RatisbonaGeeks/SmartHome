<?php
    $verbindung = mysql_connect("localhost", "root") or die (mysql_error());
    mysql_select_db("SmartHome") or die (mysql_error());
    mysql_query("UPDATE `security` SET `Safe` = 'Y' WHERE ID = '".$_GET["id"]."'");
    echo "<script type='text/javascript'>window.location.href = 'security.php?idofitem=".$_GET["idofitem"]."';</script>";
?>
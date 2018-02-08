<?php
    $verbindung = mysql_connect("localhost", "root") or die (mysql_error());
    mysql_select_db("SmartHome") or die (mysql_error());
    $secure_db = mysql_query("SELECT * FROM Security");
    $secure = true;
    while ($reihe = mysql_fetch_array($secure_db)) {
    	if ($reihe['Secure'] == 'N' && $reihe['Safe'] == 'N') {
    		$secure = false;
    	}
    }  
?>
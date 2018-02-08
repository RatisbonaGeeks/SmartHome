<?php
    include 'DBConnection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SmartHome</title>
		<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript">

			function lightimgchange (ID, Val) {
				var imgID = 'light' + ID;
				var elem = document.getElementById(imgID);
				if (Val == 1) {
					elem.src = "img/light_on_off.gif";
					setTimeout(function(){
				        elem.src = "img/light_off.png";
				    }, 450);
				}
				else {
					elem.src = "img/light_off_on.gif";
					setTimeout(function(){
				        elem.src = "img/light_on.png";
				    }, 450);
				}
			}

			var actmp = 2;
		</script>
		<script src="menu.js"></script>
		<link href="stylesheet.css" rel="stylesheet">
		<style>
			table[class='item'] {
			    border-collapse: collapse;
			}
			table[class='item'], th[class='item'], td[class='item'] {
			    border: 1px solid black;
			}
		</style>
	</head>
	<body>
		
		<?php

			include 'menu.html';

    	?>
		<div style="width:79%; height:100%; top:0; bottom:0; right:0; position:fixed;">
			<br>
				<?php
					$anzahl = mysql_result(mysql_query("SELECT COUNT(*) AS anzahl FROM light"), 0); 
					$anzahl = floor(sqrt($anzahl)+0.999)*160;
					echo "<div style='width:".$anzahl."px; height:".$anzahl."px; max-width: 100%; max-height:100%;'>";
					$light_db = mysql_query("SELECT * FROM light");
	    			while ($reihe = mysql_fetch_array($light_db)) {
	    				echo "<div style='width:160px; float:left;'>
	    					<table width='160px'>
		    					<tr align='center'>
			    					<td>";
			    					if ($reihe['Status'] == 'Y') {
			    						echo "<a href='lightonoff.php?id=".$reihe['ID']."&on=y' style='text-decoration:none;'><img src='img/light_on.png' alt='On' id='light".$reihe['ID']."' height='75px' width='75px' onmouseenter='lightimgchange(".$reihe['ID'].", 1)' onmouseleave='lightimgchange(".$reihe['ID'].", 0)' style='border-radius:20%;'></a>";
			    					}
			    					else {
			    						echo "<a href='lightonoff.php?id=".$reihe['ID']."&on=n'><img src='img/light_off.png' alt='Off' id='light".$reihe['ID']."' height='75px' width='75px' onmouseenter='lightimgchange(".$reihe['ID'].", 0)' onmouseleave='lightimgchange(".$reihe['ID'].", 1)' style='border-radius:20%;'></a>";
			    					}
			    					echo "</td>
			    				</tr>
			    				<tr align='center' style='font-family:Arial; font-size:18px;'>
			    					<td>".$reihe['Name']."</td>
			    				</tr>	
			    			</table>
			    			<br>
			    		</div>";
	    			}
	    			echo "</div>";
				?>
		</div>
	</body>
</html>
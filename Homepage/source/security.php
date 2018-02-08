<?php
    include 'DBConnection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SmartHome</title>
		<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<link href="stylesheet.css" rel="stylesheet"> 
		<style>
			.popup {
			    /*display: none;  Hidden by default */
			    position: fixed; /* Stay in place */
			    z-index: 2; /* Sit on top */
			    left: 0;
			    top: 0;
			    right: 0; /* Full width */
			    bottom: 0; /* Full height */
			    overflow: auto; /* Enable scroll if needed */
			    background-color: rgb(0,0,0); /* Fallback color */
			    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content/Box */
			.popup-content {
			    background-color: white;
			    z-index: 3;
			    margin: 10% auto; /* 10% from the top and centered */
			    padding: 0px;
			    border: 1px solid black;
			    width: 85%; /* Could be more or less, depending on screen size */
			}
		</style>
		<script type="text/javascript">

			var actmp = 4;

			function openpopup(ID){
    			window.location.href = "security.php?idofitem="+ID;
    		}
    		function closepopup(){
    			window.location.href = "security.php";
    		}
    		function notopenpopup(){
	    		document.getElementById('popupi').style.display = "none"
	    	}
		</script>
		<script src="menu.js"></script>
		<style>
			table[class='item'] {
			    border-collapse: collapse;
			}
			table[class='item'], th[class='item'], td[class='item'] {
			    border: 1px solid black;
			}
			button[class='itembtn'] {
				margin: 0;
				padding: 0;
				background-color: white;
				border: 0px;
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
						$anzahl = floor(sqrt($anzahl)+0.999)*180;
						echo "<div style='width:".$anzahl."px; width:".$anzahl."px; max-width: 100%; max-height:100%;'>";
						$secure_i_db = mysql_query("SELECT * FROM security_items");
						while ($reihe = mysql_fetch_array($secure_i_db)) {
							$safeness = true;
							$secure_db = mysql_query("SELECT * FROM security ORDER BY `Time` ASC");
							while ($reihe2 = mysql_fetch_array($secure_db)) {
								if ($reihe['ID'] == $reihe2['Name']) {
									$lastUpdate = $reihe2['Time'];
									if ($reihe2['Secure'] == 'N' && $reihe2['Safe'] == 'N') {
										$safeness = false;
									}
								}
									
							}
  						  	echo "<div style='width:180px; float:left;'>
  						  		<button onclick='openpopup(".$reihe['ID'].")' class='itembtn'>
	  						  		<table class='item'>
	  						  			<tr class='item'>
	  						  				<td rowspan='2' class='item'>";
	  						  				if ($safeness == true) {
    											echo "<img src='img/okay.png' alt='Y' width='30px' height='30px'>";
									    	}
									    	else {
    											echo "<img src='img/failure.png' alt='N' width='30px' height='30px'>";
									    	}
	  						  				echo "</td>
	  						  				<td class='item'>".$reihe['Name']."
	  						  				</td>
	  						  			</tr>
	  						  			<tr class='item'>
	  						  				<td class='item'>$lastUpdate
	  						  				</td>
	  						  			</tr>
	  						  		</table>
	  						  	</button>
	  						</div>";
	    					}
					?>
			
			
		</div>
		<div id="popupi" class="popup">
			<div class="popup-content">
				<div style="background-color:#848484; width:100%; height:35px;">
					<?php 
						if (isset($_GET["idofitem"])) {
							$secure_i_db = mysql_query("SELECT * FROM security_items");
							while ($reihe = mysql_fetch_array($secure_i_db)) {
								if ($_GET["idofitem"] == $reihe['ID']) {
									echo "<span style='margin:0; padding:15px; font-family:Arial; color:white;font-size:24px;'>".$reihe['Name']."</span>";
								}
							}
						}
					?>
					<button name="close" onclick="closepopup()" style="float: right; margin:5px;">&times;</button>
				</div>
				<div style="margin:10px">
					<?php
						if (isset($_GET["idofitem"])) {
							echo "<table align='center' class='item'>";
							$secure_db = mysql_query("SELECT * FROM Security WHERE `Name` = '".$_GET["idofitem"]."'");
    						while ($reihe = mysql_fetch_array($secure_db)) {
    							echo "<tr class='item'>
	  						  		<td class='item'>";
	  						  			if ($reihe['Secure'] == 'Y') {
    										echo "<img src='img/okay.png' alt='Y' width='30px' height='30px'>";
									    }
									    else {
    										echo "<img src='img/failure.png' alt='N' width='30px' height='30px'>";
									    }
	  						  		echo "<td class='item'>".$reihe['Time']."</td>";
	  						  		echo "<td class='item'>".$reihe['KindOf']."</td>
	  						  		<td class='item'>";
	  						  		if ($reihe['Safe'] == 'Y') {
    									echo "<img src='img/okay.png' alt='Y' width='30px' height='30px'>";
									}
									else {
    									echo "<a href='securitysafenesscheck.php?idofitem=".$_GET["idofitem"]."&id=".$reihe['ID']."'><img src='img/failure.png' alt='N' width='30px' height='30px'></a>";
									}
	  						  		
	  								echo "</td>
	  							</tr>";
    						}
							echo "</table>";
						}
					?>
				</div>
		    	
		    	
			</div>
    	</div>
    	<?php 
    		if (!isset($_GET["idofitem"])) {
    			echo "<script type='text/javascript'>
		    		notopenpopup();
		    	</script>";
    		}

    	?>
    	
	</body>
</html>
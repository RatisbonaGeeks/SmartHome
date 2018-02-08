<?php
    include 'DBConnection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SmartHome</title>
		<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="../iOS-Style-Checkbox-Plugin/iosCheckbox.js"></script>
		<script type="text/javascript">

			jQuery(function ($){
		    	$(".ios").iosCheckbox();
			});

			var actmp = 1;
		</script>
		<link href="stylesheet.css" rel="stylesheet">
		<script src="menu.js"></script>
		<link href="../iOS-Style-Checkbox-Plugin/iosCheckbox.css" rel="stylesheet">
		<style>
		</style>
	</head>
	<body>
	
		<?php
		    include 'menu.html';
    	?>
		<div style="width:79%; height:100%; top:0; bottom:0; right:0; position:fixed;">
			<input type="checkbox" class="ios">
			<br>
			<input type="checkbox" class="ios">
		</div>
	</body>
</html>
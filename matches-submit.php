<?php

session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to NerdLuv</title>
		<link rel="stylesheet" type="text/css" href="nerdieluv.css" />
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<img src="icon.PNG" alt="Icon" />
		</header>

		<?php 
			if (!isset($_SESSION["name"])) {
				$_SESSION["name"] = $_GET["name"];
			}
		?>

			<div id="bannerarea">
				<div class="match">
					<?php
						include_once ("functions.php");
				    	match_name_validation();

					?>
				</div>
					<?php
						include_once ("common.php");
						para();
					?>	
			</div>
		
		<footer>	
			<?php
				include_once ("common.php");
				footer();
			?>
		</footer>
	</body>
</html>


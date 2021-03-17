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

			<div id="bannerarea">
				<?php
					include_once ("functions.php");
					signup_form_validations();

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
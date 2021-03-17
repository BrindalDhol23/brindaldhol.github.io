<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Welcome to NerdLuv</title>
		<link rel="stylesheet" type="text/css" href="nerdieluv.css" />	
	</head>

	<body>
		<header>
			<img src="icon.PNG" alt="Icon" />
		</header>

		<div id="main">	
		<h2>Welcome!</h2>	
			<div id="bannerarea">
				<img src="signup.png" alt="signup" id="signup" />
				<a href="signup.php">&nbsp;Signup for New Account</a><br /><br/>
				<img src="heart.jpg" alt="login" id="login" />
				<a href="matches.php" class="text">&nbsp;Check your Matches</a><br />
				<?php
					include_once ("common.php");
					para();
				?>	
			</div>
		</div>

		<footer>	
			<p>
			    <a href="http://jigsaw.w3.org/css-validator/check/referer">
			        <img style="border: 0px; width: 88px; height: 31px;" src="vcss.gif" alt="Valid CSS!" />
			    </a>
	    	</p>
		</footer>
		
	</body>
</html>
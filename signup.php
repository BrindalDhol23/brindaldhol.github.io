<!DOCTYPE html>
<html>
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
				<fieldset>
					<legend>New User Signup</legend>
					<form action="signup-submit.php" method="POST">
						
							<label for="name"><strong> Name:</strong> </label>  
							<input type="text" name="name" id="name" maxlength="16"> <br><br>
							<label><strong> Gender: </strong> </label>
							<input type="radio" name="gender" value="M"> Male
							<input type="radio" name="gender" value="F" checked> Female <br><br>
							<label for="age"> <strong> Age: </strong></label>  
							<input type="text" name="age" id="age" maxlength="2" size="6"> <br><br>
							<label for="personality"><strong> Personality: </strong></label>  
							<input type="text" name="personality" id="personality" maxlength="4" size="6"><a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp" target="_blank"> (Don't know your type?) </a> <br><br>
							<label><strong> Favorite OS: </strong></label>
							<select id="os" name="os">
								<option>Windows</option>
								<option>MAC OS X</option>
								<option>Linux</option>
							</select><br><br>
							<label> <strong> Seeking Age: </strong></label>  
							<input type="text" name="min" id="exp_age1" maxlength="2" size="6" placeholder="min"> &#160; to &#160;
							<input type="text" name="max" id="exp_age2" maxlength="2" size="6" placeholder="max"> <br><br>
							<label><strong> Seeking Gender: </strong> </label>
							<input type="checkbox" name="genderM" value="M" checked> Male
							<input type="checkbox" name="genderF" value="F"> Female <br><br>
							<input type="submit" name="signin" value="Sign In">
					</form>
				</fieldset>
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
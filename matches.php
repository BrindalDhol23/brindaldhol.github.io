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
		<?php
		if(isset($_SESSION["name"]))
		{
			header("location:matches-submit.php?name=" . $_SESSION["name"] . "&signin=View+My+Matches");
		} 
		?>
		<header>
			<img src="icon.PNG" alt="Icon" />
		</header>

			<div id="bannerarea">
				<fieldset>
					<legend>Returning Users</legend>
					<form action="matches-submit.php" method="GET">
							<label for="name"><strong> Name:</strong> </label>  
							<input type="text" name="name" id="name" maxlength="16"> <br><br>
							<br>
							<input type="submit" name="signin" value="View My Matches">
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

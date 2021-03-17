<?php

function signup_form_validations()
{
	//verify if the name field is empty
	if (empty($_POST["name"])) {
		echo "<br><br>Invalid input! Please enter the valid name.<br><br>";
	}
	//verify if entered age is between 0 and 99 and non-empty.
	elseif (empty($_POST["age"]) || !preg_match("/^[0-9][0-9]$/", $_POST["age"])) {
		echo "<br><br>Invalid input! Please enter age between 0 to 99.<br><br>";
	}
	//verify if personality type is one of the 16 types only and non-empty.
	elseif (empty($_POST["personality"]) || !preg_match("/^[IE]{1}[NS]{1}[FT]{1}[JP]{1}$/", $_POST["personality"])) {
		echo "<br><br>Invalid personality type! Please visit the link given to know your exact personality type.<br><br>";
	}
	//verify that min and max age is between 0 and 99 and non-empty.
	elseif (empty($_POST["min"]) || empty($_POST["max"]) || !preg_match("/^[0-9][0-9]$/", $_POST["min"]) && !preg_match("/^[0-9][0-9]$/", $_POST["max"])) {
		echo "<br><br>Invalid input! Please enter valid min and max seeking age between 0 to 99.<br><br>";
	}
	//verify min age is not greater than max age.
	elseif ($_POST["min"] > $_POST["max"]) {
		echo "<br><br>Invalid input! Minimum age cannot be greater than maximum age.<br><br>";
	}

	elseif (empty($_POST["genderM"]) && empty($_POST["genderF"]) ) {
		echo "<br><br>Invalid input! Please select at least one checkbox for seeking gender.<br><br>";
	}
	//if all validation are satified, then call the function that checks if the record with same name already exists.
	else {
		name_validation();
	}
	
}

//this function checks if the name of the user already exists in the database.
function name_validation()
{	
	$search_match = $_POST["name"];
	$file = "singles2.txt";
	//if the record for entered name exists, then split that record into array and store name in a variable.
	$handle = @fopen($file, "r");
	if ($handle)
	{ 
		$matched = 0;
	    while (!feof($handle))
	    {	
	        $buffer = fgets($handle);
	        $check_name = explode (",", $buffer);
	  	    $verify = $check_name[0];
	        if(strnatcasecmp($verify, $search_match) == 0)
	        	$matched++;
	    }
	    fclose($handle);
	}	

	if (empty($matched)) {
		
		add_record();
    }

	else {
		
		echo '<h2>Sorry!</h2>'; 
		echo 'Entered name already exists! ';
		echo '<a href="signup.php">Sign In</a> with new name to see your matches!'; 
	}
	
	
}

//this function adds the new record in the file.
function add_record()
{
				
	$name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $personality = $_POST["personality"];
	$os = $_POST["os"];
	$min_exp_age = $_POST["min"];
	$max_exp_age = $_POST["max"];
	$seekmale = $_POST["genderM"];
	$seekfemale = $_POST["genderF"];

	echo '<h2>Thank You!</h2>';
	echo '<p>Welcome to NerdLuv, ';
	echo $name;
	echo '!</p>';
	echo '<p>Now <a href="matches.php"> log in to see your matches!</a></p>';

    $result = "\n" . $name .",". $gender .",". $age .",". $personality . "," . $os . "," . $min_exp_age . "," . $max_exp_age ."," . $seekmale . $seekfemale;

	$filename = 'singles2.txt';

	
	if (is_writable($filename)) {
	    if (!$handle = fopen($filename, 'a')) {
	         echo "\nCannot open file ($filename)";
	         exit;
	    }

	    if (fwrite($handle, $result) === FALSE) {
	        echo "\nCannot write to file ($filename)";
	        exit;
	    }

	    fclose($handle);

	} 

	else {
	    echo "\nThe file $filename is not writable";
	}
	

}



function match_name_validation()
{
	if (empty($_GET["name"])) {
		echo "<br><br>Invalid input! Please enter the name to find the matches.<br><br>";
	}

	else {
		match_name_verify();
	}


}


//this function verifies the user record in the database.
function match_name_verify()
{
	$file="singles2.txt";

	//search the entered name in the txt file.
	$search_match = $_GET["name"];
	//if the record for entered name exists, then split that record into array and store name in a variable.
	$handle = @fopen($file, "r");
	if ($handle)
	{
		$verify2 = "";
		$check_name2 = array();
	    while (!feof($handle))
	    {
	        $buffer = fgets($handle);
	        if(strpos($buffer, $search_match) !== FALSE)
	        	$check_name2 = explode (",", $buffer);
	        	if (isset($check_name2[0])) {
		  	    $verify2 = $check_name2[0];
		  	}

	    }
	    fclose($handle);
	}

	//if the record with the name is found in database then function is called to display the matches for that user.
	if($search_match == $verify2) {
			match_submit();
	}

	else {						
		echo '<h2>Sorry!</h2> Profile with <span>'. $search_match . '</span> name not found. 
				<a href="signup.php">Sign In</a> first to see your matches!';

	}

}

//this function displays the matches based on the user specifications.
function match_submit()
{
	echo '<h2>Matches for ';
	echo $_GET["name"];
	echo ':</h2><br><br>';
	$file="singles2.txt";
	$searchthis = $_GET["name"];
	//if the record for entered name exists, then split that record into array and store name in a variable.
	$handle = @fopen($file, "r");
	if ($handle)
	{
	    while (!feof($handle))
	    {
	        $buffer = fgets($handle);
	        if(strpos($buffer, $searchthis) !== FALSE)
	        	$matches = $buffer;

	    }
	    fclose($handle);
	
	// split the string record of the entered name into array using comma delimeter and store the array elements into variables.
	$print1 = explode (",", $matches);
	  	   $xname = $print1[0];				
		   $xgender = $print1[1];							   
		   $xage = $print1[2];							   
		   $xpersonality = $print1[3];							  
		   $xos = $print1[4];							   
		   $xagemin = $print1[5];							  
		   $xagemax = $print1[6];
		   $xseekgender = $print1[7];

	// splits all the strings into array and stores it into variables till the end of file.
	$handle = fopen($file, "r");
		while(!feof($handle)){
		  $line = fgets($handle);
		  	$print = explode (",", $line);
		  	   $pname = $print[0];				
			   $pgender = $print[1];							   
			   $page = $print[2];							   
			   $ppersonality = $print[3];							  
			   $pos = $print[4];							   
			   $pagemin = $print[5];							  
			   $pagemax = $print[6];
			  
			// compare the conditions for the record of entered name with all the records of file, if all the conditions are satisfied then print that record information as "matched" profiles.   
				//compare the seeking gender of the current user (with entered name) with gender of all users in file.
   	  			$compare = similar_text("$xseekgender","$pgender");
				if($compare != 0)
					{   //compare favorite OS
					   	if($xos == $pos)
							{	//check the age of users from file that falls between min and max age of the current user.
						   	  	if($xagemin <= $page && $page <= $xagemax)
							   	  	{	//check for personality, if 1 or more than 1 matches then print.
							   	  		$persona = similar_text("$xpersonality","$ppersonality");
							   	  		if($persona != 0)
								   	  		{	//the user whose matches are displayed should not be a part of results displayed as well.
								   	  			if($xname != $pname)
								   	  			{
								   	  				echo '<p><img src="profileicon.png" alt="profile"/>';
												    echo $pname;
													echo '</p>';
													echo '<ul>';
														echo '<li>Gender: ';
												   		echo "$pgender";
												   		echo '</li>';
												   		echo '<li>';
												    	echo "Age: $page ";
												    	echo '</li>';
												    	echo '<li>';
												    	echo "Personality Type: $ppersonality";
												    	echo '</li>';
												    	echo '<li>';
												    	echo "OS: $pos";
												    	echo '</li>';
											    	echo '</ul>';
								   	  			}
								   	  		}
							   	  	}
							}
				    }
		}

		fclose($handle);
	}
}

?>
					

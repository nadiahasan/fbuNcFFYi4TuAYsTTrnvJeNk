<!DOCTYPE html>
<html>
<head>
<style>

body {
    background-color: #32CD32;
}

</style>
<title>Report Abuse</title>
</head>
<body>

<?php


if(isset($_POST['submit'])){
	$data_missing = array();
	
	if(empty($_POST['f_name'])){
		$data_missing[] = 'First Name';
	} else{
		$user_f_name = trim($_POST['f_name']);
	}
	
	if(empty($_POST['l_name'])){
		$data_missing[] = 'Last Name';
	} else{
		$user_l_name = trim($_POST['l_name']);
	}
	
	if(empty($_POST['u_name'])){
		$data_missing[] = 'Username';
	} else{
		$user_u_name = trim($_POST['u_name']);
	}
	
	if(empty($_POST['email'])){
		$data_missing[] = 'Email';
	} else{
		$user_email = trim($_POST['email']);
	}
	
	if(empty($_POST['description'])){
		$data_missing[] = 'Description of Incident';
	} else{
		$des = trim($_POST['description']);
	}
	
	if(empty($data_missing)){
		//send data to DB
		require_once('mysqli_connect.php');
		
		$query = "INSERT INTO REPORTS (
		REPORT_NUMBER,REPORTER_FIRSTNAME,REPORTER_LASTNAME,
		EMAIL,REPORT_DATE,REPORT_MESSAGE,REPORTED_COMMENT_ID)
		VALUES(NULL,?,?,?,NOW(),?,?)";
		
		$stmt = mysqli_prepare($dbc,$query);
		
		mysqli_stmt_bind_param($stmt,"ssssi",$user_f_name,$user_l_name,$user_email,$des,1);
		mysqli_stmt_execute($stmt);
		
		
		if(mysqli_stmt_affected_rows($stmt) ==1){ //if the insert statement works the connection to DB is closed
			echo 'Thank you for your feedback!';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		}else{ //prints out error and closes the connection to the DB
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		}
	} else{ //if there is missing data
		
		echo 'You have not entered data for';
		foreach($data_missing as $mData){
			echo "$mData ";	
		}
		echo "<br/>";
		echo "<form action=\"reportabuse.php\" id=\"abuse\" method=\"post\">";
	
		echo "<b>Create New Report</b>";
		echo "<p>First Name:";
		echo "<input type=\"text\" name =\"f_name\" size=\"30\" maxlength=\"30\" value=" .$user_f_name. " required</>";
		echo "</p>";
			
		echo "<p>Last Name:";
		echo "<input type=\"text\" name=\"l_name\" size=\"30\" maxlength=\"30\" value=" .$user_l_name." required</>";
		echo "</p>";
			
		echo "<p>Username:";  
		echo "<input type=\"text\" name =\"u_name\" size=\"30\" maxlength=\"30\" value=" .$user_u_name. " required</>";
		echo "</p>"; // Used to find USERID in the database-->
			
		echo "<p>Email:";   
		echo "<input type=\"text\" name =\"email\" size=\"30\" maxlength=\"30\" value=" .$user_email." required</>";
		echo "</p>";
			
		echo "<p>Description:<br>";
		echo "<textarea name=\"description\" rows=\"10\" cols=\"100\" >" .$des. "</textarea>";
		echo "</p>";
			
		echo "<p>";
		echo "<input type=\"submit\" name=\"submit\" value=\"Report\"/>";
		echo "</p>";
			
		echo "</form>"
				
		
		
		
		
		
		
		
	}
} else { //
	//when the page was opened for the first time
	echo 'File abuse';
	
}
?>


</body>
</html>


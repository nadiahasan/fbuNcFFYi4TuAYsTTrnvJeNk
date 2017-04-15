
<!DOCTYPE html>
<html>
<head>
<title>Report Abuse</title>
</head>
<body>


<form action="reportabuse.php" id="abuse" method="post">
	
	<b>Create New Report</b>
	<p>First Name:
	<input type="text" name ="f_name" size="30" maxlength="30" value="" required</>
	</p>
	
	<p>Last Name:
	<input type="text" name ="l_name" size="30" maxlength="30" value="" required</>
	</p>
	
	<p>Username:  
	<input type="text" name ="u_name" size="30" maxlength="30" value="" required</>
	</p> <!-- Used to find USERID in the database-->
	
	<p>Email:     
	<input type="text" name ="email" size="30" maxlength="30" value="" required</>
	</p>
	
	<p>Description:<br>
	<textarea name="description" rows="10" cols="100" ></textarea>
	</p>
	
	<p> 
		<input type="submit" name="submit" value="Report"/>
	</p>
	
</form>
	
	<?php
/**
 * Created by Shawn Godwin
 * Date: 3/20/2017
 * Last Modified 4/4/2017
 * Purpose: HTML for the Abuse Reporter
 */
?>
	
	
	
	


</body>
</html>
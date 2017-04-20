<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Authors: Nadia Hasan, Shawn Godwin
 * Date: 4/15/17
 * Time: 3:40 PM
 * Purpose: This file displays a report abuse form related to a specific
 *          comment in a specific course page. It retrives the course id and
 *          comment id.
 */
session_start(); // start session

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "RATEMYCOURSE";

// Create a connection to mysql server
$conn = new mysqli($servername, $username, $password,$dbname);

// Check if connection is not successful
if ($conn->connect_error) {
    die("Connection to serverfailed: " . $conn->connect_error);
}


if(isset($_POST['report'])){

    $course_id=explode("___",$_POST['report']);
    $comment_id=$course_id[2];
    $course_id=$course_id[1];

}



include "topMenu.php";

?>
<html>
<head>
    <title>Report Abuse</title>
    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>
<body>


<form action="reportAbuseConfirmation.php" id="abuse" method="post">

    <h3>Report Abuse: </h3>
    <label>First Name:</label>
<input type="text" name ="f_name" size="30" maxlength="30" required/>

<br/><br/>


<label>Last Name:</label>
<input type="text" name ="l_name" size="30" maxlength="30"  required/>

<br/><br/>


<label>Username:</label>
<input type="text" name ="u_name" size="30" maxlength="30"  />
 <!-- Used to find USERID in the database-->
    <br/><br/>
<label>Email:</label>
<input type="email" name ="email" size="30" maxlength="30" required/>

<br/><br/>

<label>Message:
        <textarea name="message" rows="10" cols="100" >

        </textarea>
</label>

<br/><br/>
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
    <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
<button type="submit" name="submit" value="Report">Submit</button>


</form>

</body>
</html>
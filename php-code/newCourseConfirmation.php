<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/15/17
 * Time: 12:08 PM
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

$sql_command="select * from USERS where USERNAME='".$_SESSION['username']."' and PRIVILEGE_LEVEL=1;";

$result = $conn->query($sql_command); // submitting query to database



// If there is at least one user with the same username or email, display an error message

if($result->num_rows ==0){
    die("Unauthorized Access");

}

$sql_command="INSERT INTO COURSE VALUES('".$_POST['courseID']."','".$_POST['courseName']."','".$_POST['collegeName']."','".$_POST['courseDesc']."');";
$result = $conn->query($sql_command); // submitting query to database

echo "<h2>Course Added Successfully</h2>";


?>


<html>
<head>

</head>

<body style="background-color: azure;">
<br/>
<div>
    <?php

    include "adminMenu.php";
    ?>
    <br/>

    <?php

    include "topMenu.php";
    ?>
</div>


</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Author: Nadia Hasan
 * Date: 4/15/17
 * Time: 12:35 PM
 * Purpose: This file handles deleting users from database.
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


if($result->num_rows ==0){
    die("Unauthorized Access");

}
include "adminMenu.php";
include "topMenu.php";

foreach ($_POST as $key => $value) {
    if($key==='action') break;

    $keye=explode("___",$key);
    $emaile=explode("&&&",$keye[1]);
    $emailee=$emaile[0];
    for ($x=0;$x<sizeof($emaile)-1;$x++)
    {
        $emailee=$emailee.'.'.$emaile[$x+1];
    }
    if($_POST['action']==='delete'){

        // Deleting users from database
        $sql_command="DELETE FROM USERS WHERE USERNAME=\"".$keye[0]."\" and EMAIL=\"".$emailee."\";";
        $result = $conn->query($sql_command); // submitting query to database

    }
}
?>


<html>
<head>

</head>
<body style="background-color: azure;">
<div>

    <h2>User(s) deleted successfully.</h2>
</div>
</body>
</html>

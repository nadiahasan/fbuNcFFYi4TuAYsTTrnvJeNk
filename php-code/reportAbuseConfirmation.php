<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Authors: Nadia Hasan, Shawn Godwin
 * Date: 4/16/17
 * Time: 11:50 PM
 * Purpose: This file handles submitting and inserting an abuse report
 *          to reports table in database.
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


if(isset($_POST['submit'])) {
    //echo $_POST['course_id']."  ".$_POST['comment_id'];


    $sql_command=
        "INSERT INTO REPORTS VALUES(0,'".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['u_name']."','".$_POST['email']."',NOW(),'".$_POST['message']."','".$_POST['course_id']."','".$_POST['comment_id']."');";

    $result = $conn->query($sql_command); // submitting query to database

    if($result==1){
        include "topMenu.php";
        ?>

        <html>
        <head>

        </head>
        <body style="background-color: azure;">
            <h2>Report Submitted Successfully.</h2>
        </body>

        </html>
<?php
    }

}
?>






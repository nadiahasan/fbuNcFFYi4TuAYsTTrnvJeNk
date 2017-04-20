<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Author: Nadia Hasan
 * Date: 4/15/17
 * Time: 4:17 PM
 * Purpose: This file handles the abuse reports by s
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

// Abuse reports can only be viewed by admin.
$sql_command="select * from USERS where USERNAME='".$_SESSION['username']."' and PRIVILEGE_LEVEL=1;";

$result = $conn->query($sql_command); // submitting query to database



// If there is at least one user with the same username or email, display an error message

if($result->num_rows ==0){
    die("Unauthorized Access");
}
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>

<body id="abuseReportsBody">
<?php
include "adminMenu.php";

?>


<br/>

<?php
include "topMenu.php";
?>
<h2>Reports: </h2>
<form method="post" action="newCourse.php"></form>
<div id="abuseReportsOuterDiv">

    <table style="width: 100%;">
        <thead>
        <tr style="background-color: blanchedalmond;">
            <td style="padding-left: 10px; padding-right: 10px;">First Name</td>
            <td style="padding-left: 10px; padding-right: 10px;">Last Name</td>
            <td style="padding-left: 10px; padding-right: 10px;">EMAIL</td>
            <td style="padding-left: 10px; padding-right: 10px;">Message</td>

        </tr>

        </thead>

        <tbody>

        <?php
        $sql_command="select * from REPORTS";
        $result=$conn->query($sql_command); // submitting query to database
        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['REPORTER_FIRSTNAME']."</td><td>".$row['REPORTER_LASTNAME']."</td><td>".$row['EMAIL']."</td><td>".$row['REPORT_MESSAGE']."</td>";
                echo "</tr>\n";

            }
        }
        ?>

        </tbody>

    </table>



</body>
</html>
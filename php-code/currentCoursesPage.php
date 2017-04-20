<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/14/17
 * Time: 10:53 PM
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
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>

<body id="currentCoursesBody">
<?php
include "adminMenu.php";
?>

<br/>


<?php
include "topMenu.php";
?>

<h2>Current Courses: </h2>

<form method="post" action="newCourse.php"></form>
<div id="currentCoursesOuterDiv">

        <table id="currentCoursesTable" style="width: 100%;">
            <thead>
            <tr style="background-color: blanchedalmond;">
                <td style="padding-left: 10px; padding-right: 10px;">Course ID</td>
                <td style="padding-left: 10px; padding-right: 10px;">Course Name</td>
                <td style="padding-left: 10px; padding-right: 10px;">College</td>
                <td style="padding-left: 10px; padding-right: 10px;">Course Description</td>


            </tr>

            </thead>

            <tbody>

            <?php
                $sql_command="select * from COURSE";
                $result=$conn->query($sql_command); // submitting query to database
            if($result->num_rows >0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['COURSE_ID']."</td><td>".$row['COURSE_NAME']."</td><td>".$row['COLLEGE']."</td><td>".$row['COURSE_DESCRIPTION']."</td>";
                    echo "</tr>\n";

                }
            }
            ?>

            </tbody>

        </table>
    <br/>
    &nbsp;&nbsp;
    <a href="newCourse.php">+ Add New Course</a>
</div>

</body>
</html>


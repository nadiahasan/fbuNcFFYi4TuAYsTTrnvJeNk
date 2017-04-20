<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Author: Nadia Hasan
 * Date: 4/14/17
 * Time: 10:23 PM
 * Purpose: This file views displays users table to admin, with checkboxes
 *          for approval/disapproval actions.
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

// only admin can view this page
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

<body id="pendingUsersBody">
<?php
include "adminMenu.php";
?>
<br/>

<?php
include "topMenu.php";
?>
<h2>Pending Users: </h2>

<form method="post" action="pendingUserConfirmation.php">


<div>
    <div id="pendingUsersOuterDiv">
        <table style="width: 100%;">
            <thead>
            <tr style="background-color: blanchedalmond;">
                <td style="padding-left: 10px; padding-right: 10px;">Approve</td>
                <td style="padding-left: 10px; padding-right: 10px;">First Name</td>
                <td style="padding-left: 10px; padding-right: 10px;">Last Name</td>
                <td style="padding-left: 10px; padding-right: 10px;">Username</td>
                <td style="padding-left: 10px; padding-right: 10px;">Email</td>
            </tr>
            </thead>
            <tbody>

            <?php
                // Displaying pending users to admin
                $sql_command="select * from USERS where PENDING_FLAG=1;";

                $result = $conn->query($sql_command); // submitting query to database

            if($result->num_rows >0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    //Replacing each dot with &&& to prevent errors when posting
                    $emaile=explode(".", $row['EMAIL']);
                    $emailee=$emaile[0];
                    for ($x=0;$x<sizeof($emaile)-1;$x++)
                    {
                        $emailee=$emailee.'&&&'.$emaile[$x+1];
                    }
                    echo "<td><input type=\"checkbox\" name=\"".$row['USERNAME']."___".$emailee."\"/></td><td>".$row['FIRST_NAME']."</td><td>".$row['LAST_NAME']."</td><td>".$row['USERNAME']."</td><td>".$row['EMAIL']."</td>";
                    echo "</tr>\n";

                }

            }
            ?>
            </tbody>
        </table>
        <br/>
        <div style="width: 100%;text-align: center;">
            <button type="submit" name="action" value="approve">Approve Marked Users</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" name="action" value="disapprove">Disapprove Marked Users</button>
        </div>
        <br/> &nbsp;
    </div>


</div>
</form>
</body>
</html>

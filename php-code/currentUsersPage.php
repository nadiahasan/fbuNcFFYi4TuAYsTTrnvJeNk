<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/14/17
 * Time: 10:52 PM
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

<body id="currentUsersBody">
<?php
include "adminMenu.php";
?>
<br/>
<?php
include "topMenu.php";
?>
<h2>Current Users: </h2>


    <form method="post" action="deleteUsersConfirmation.php">

        <div id="currentUsersOuterDiv">


        <table style="width: 100%;">
            <thead>
                <tr style="background-color: blanchedalmond;">
                    <td style="padding-left: 10px; padding-right: 10px;">Delete</td>
                    <td style="padding-left: 10px; padding-right: 10px;">First Name</td>
                    <td style="padding-left: 10px; padding-right: 10px;">Last Name</td>
                    <td style="padding-left: 10px; padding-right: 10px;">Username</td>
                    <td style="padding-left: 10px; padding-right: 10px;">Email</td>

                </tr>

            </thead>

            <tbody>
            <?php
            $sql_command="select * from USERS";
            $result=$conn->query($sql_command); // submitting query to database
            if($result->num_rows >0){

                while($row=$result->fetch_assoc()){
                    $emaile=explode(".", $row['EMAIL']);
                    $emailee=$emaile[0];
                    for ($x=0;$x<sizeof($emaile)-1;$x++)
                    {
                        $emailee=$emailee.'&&&'.$emaile[$x+1];
                    }
                  echo "<tr>";
                    if($row['USERNAME']=='admin'){
                        echo "<td/>";
                        echo "<td id='specialCase'><input type=\"checkbox\" name=\"".$row['USERNAME']."___".$emailee."\"/></td><td class='admin'>".$row['FIRST_NAME']."</td><td class='admin'>".$row['LAST_NAME']."</td><td class='admin'>".$row['USERNAME']."</td><td class='admin'>".$row['EMAIL']."</td>";
                        echo "</tr>\n";
                    }else{
                        echo "<td><input type=\"checkbox\" name=\"".$row['USERNAME']."___".$emailee."\"/></td><td>".$row['FIRST_NAME']."</td><td>".$row['LAST_NAME']."</td><td>".$row['USERNAME']."</td><td>".$row['EMAIL']."</td>";
                        echo "</tr>\n";

                    }

                }
            }

            ?>
            </tbody>
        </table>
        <br/>
        <button type="submit" name="action" value="delete">Delete Marked Users</button>
            <br/>&nbsp;
        </div>

</form>

</body>
</html>


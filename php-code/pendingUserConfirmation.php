<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/15/17
 * Time: 10:05 AM
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
include "adminMenu.php";
?>
<br/>

<?php

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
    if($_POST['action']==='approve'){

        $sql_command="UPDATE USERS SET PENDING_FLAG=0 WHERE USERNAME=\"".$keye[0]."\" and EMAIL=\"".$emailee."\";";
        $result = $conn->query($sql_command); // submitting query to database

    }else if($_POST['action']==='disapprove'){
        $sql_command="DELETE FROM USERS WHERE USERNAME=\"".$keye[0]."\" and EMAIL=\"".$emailee."\";";
        $result = $conn->query($sql_command); // submitting query to database

    }
}
?>
<html>
<head>

</head>
<body style="background-color: azure;">
<?php
if($_POST['action']==='approve') {
    ?>
    <div style="font-weight: bold;">User(s) approved</div>
    <?php
}else {
    ?>
    <div style="font-weight: bold;">User(s) disapproved and deleted</div>
    <?php
}
?>
</body>
</html>

<?php

?>




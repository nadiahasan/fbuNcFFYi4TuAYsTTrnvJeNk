<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/16/17
 * Time: 8:58 PM
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

<body id="backupPageBody">


<?php
include "adminMenu.php";
?>
<br/>

<?php

include "topMenu.php";
?>
<form action="backup.php" method="post">
    <button type="submit" name="prepare" value="doit">Prepare Database Backup File</button>
</form>
<?php
if ($_POST['prepare']==="doit")
{
    exec('/Applications/MAMP/Library/bin/mysqldump --user=root --password=root --host=localhost RATEMYCOURSE > /Users/nadiahasan/PhpstormProjects/RateMyCourse/backups/backup.mysql');
    $now = getdate();
    ?>
    <a href="backups/backup.mysql" download="backup<?php echo "_".$now['month']."_".$now['mday']."_".$now['year']; ?>.mysql">Download backup</a>
    <br/><br/>
    <?php
}

?>

</body>

</html>
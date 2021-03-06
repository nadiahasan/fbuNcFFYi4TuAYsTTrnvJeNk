<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 9:02 PM
 * Purpose: This file processes the search request done by user
 *          using the search forms available in  multiple pages.
 */

?>

<html>
<head>
<style>

body {
    background-color: #32CD32;
}

</style>
</head>
<body>
<div class="form" id="searchForm">

    <form method="post" action="searchResults.php">
        <label>Search for a course: </label>
        <input type="text" name="courseToSearch">
        <br>
    </form>

</div>

<?php
session_start(); // start a new session

// Initializing variables for the session
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


$searchWords = explode(" ",$_POST['courseToSearch']); // tokenize the search string based on spaces

$sql_command="select COURSE_ID, COURSE_NAME from COURSE where "; // creating an sql command based on search request


for($i=0;$i<count($searchWords);$i++ )
{
    // concatenating the query command based on the request
    if ($i!==0) $sql_command=$sql_command." or ";
    $sql_command=$sql_command.'COURSE_ID like "%'.$searchWords[$i].'%" or COURSE_NAME like "%'.$searchWords[$i].'%" ';
}
$sql_command=$sql_command.';';
//echo $sql_command;


$result = $conn->query($sql_command); // submitting query to database

// displaying results to the user
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo $row['COURSE_ID'].": ". $row['COURSE_NAME']."<br>";
    }
}else{
    echo "No results found";
}


?>





</body>

</html>

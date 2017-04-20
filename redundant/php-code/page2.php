<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 1:28 PM
 * Purpose: This file handles login process
 */

// Connecting php to mysql server
session_start();

// destroying any previous opened session
session_unset();
session_destroy();

// Initializing some variables for connection to database server
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

// Creating an sql query based on login information provided by user
$sql_command="select USER_PASSWORD from USERS where USERNAME='".$_POST["username"]."'";
$result = $conn->query($sql_command);


// If there is no user with the given username, an error message is printed
if ($result->num_rows!==1)
{
    die("User doesn't exist");
}
$row=$result->fetch_assoc();


// adding a security level to the password by using password hashing
if (password_verify($_POST['password'],$row['USER_PASSWORD'])){
    session_start();
    $_SESSION['username']=$_POST['username'];
    header("Location: main.php");
}
else {
    echo "Invalid password";
    //header("Location: page2.php");
}


?>



<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/10/17
 * Time: 10:37 AM
 * Purpose: This file handles signup process. It creates a connection to database
 *          server. It verifies the username and/or email are unique, then adds
 *          the user to a temporary users table so that the admin determines to
 *          accept to add the user or not.
 */

session_start(); // start session


// Initializing some variables for the connection
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


// Creating an sql command to search for users with the same username or email
$sql_command="select * from USERS where USERNAME='".$_POST['username']."' or EMAIL='".$_POST['email']."';";



$result = $conn->query($sql_command); // submitting query to database


// If there is at least one user with the same username or email, display an error message

if($result->num_rows >0){

    echo "<h1>Sign Up Error</h1>";
    echo "Username or email already exists. Please Try a different username and/or email. <br>";
    echo "<a href='signupPage.php'>Click here to re-enter your sign-up information</a>";


}else{

    //Otherwise, add the user to the PENDING_USERS table, and hash the password
    $sql_command="insert into PENDING_USERS values('".$_POST['username']."', '".password_hash($_POST['password'],PASSWORD_DEFAULT)."', '".$_POST['email']."',
'".$_POST['firstName']."', '".$_POST['lastName']."', 2);";




    $result = $conn->query($sql_command); // submitting query to database

    // Printing a success report to the user
    echo "<h1>Signup information submitted</h1>";
    echo "Your signup information is submitted to the admin for approval.<br>";
    echo "Meanwhile enjoy browsing the website.<br>";

}



?>




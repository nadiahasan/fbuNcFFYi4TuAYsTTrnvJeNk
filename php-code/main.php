<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 4:02 PM
 *
 * Purpose: This file represents the main page that contains the courses.
 */
session_start();

if (!isset($_SESSION['username']))
{
   header("Location: index.php");
}
else {

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

    if($result->num_rows !==0){
        include "adminMenu.php";
    }



    ?>

    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
    </head>
    <body style="background-color: azure;">

    <div class="form" id="searchForm" style="float: right">

        <form method="post" action="searchResults.php">
            <label>Search for a course: </label>
            <input type="text" name="courseToSearch">
            <br>
        </form>

    </div>
    <?php
    include "topMenu.php";

    ?>

    </body>
    </html>

    <?php
}
    ?>
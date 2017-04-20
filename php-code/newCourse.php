<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/14/17
 * Time: 11:01 PM
 */

session_start();

if (!isset($_SESSION['username']))
{
    header("Location: errorPage1.php");
}
else {

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "RATEMYCOURSE";

// Create a connection to mysql server
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is not successful
    if ($conn->connect_error) {
        die("Connection to serverfailed: " . $conn->connect_error);
    }

    $sql_command = "select * from USERS where USERNAME='" . $_SESSION['username'] . "' and PRIVILEGE_LEVEL=1;";

    $result = $conn->query($sql_command); // submitting query to database


    if ($result->num_rows !== 0) {

        include "adminMenu.php";
        ?>
        <br/>
        <?php

        include "topMenu.php";
    }
    ?>

    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
    </head>
    <body>


    <div class="form" id="newCourseForm">

        <br>
        <br>
        <br>
        <!-- New Course form -->
        <form method="post" action="newCourseConfirmation.php">
            <h3>New Course Form</h3>
            <br/>
            <br/>
            <label>Course ID: </label>
            <input type="text" name="courseID" required>
            <br/>
            <br/>
            <label>Course Name: </label>
            <input type="text" name="courseName" required>
            <br/>
            <br/>
            <label>College Name: </label>
            <input type="text" name="collegeName" required>
            <br/>
            <br/>
            <label>Course Description:</label>
            <textarea rows="5" name="courseDesc" required>Enter text here</textarea>
            <br>
            <br>
            <br>

            <input type="submit">
        </form>


    </div>


    </body>

    </html>
    <?php
}
?>
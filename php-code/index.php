<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 1:19 PM
 * Purpose: This page contains search and login forms.
 */

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>

<body id="indexPageBody">

<div class="form" id="searchForm" style="float: right;">

    <!--
        This is the search form
    -->

    <form method="post" action="searchResults.php">
        <label>Search for a course: </label>
        <input type="text" name="courseToSearch">
        <br>
    </form>

</div>

<div style="font-size: 1.5em; color: brown ;margin-top: 15px;margin-bottom:15px;
font-weight: bold; margin-left: 550px">
    Rate My Course
</div>


<div id="aboutIndexPage">
    <p style="font-weight: bold; text-align: center; color: brown; font-size: smaller">
        Welcome to Rate My Course </br/>
    </p>
    <p>
        This application aims to make student life easier by providing them with course
        experience and feedback of other students who have taken the course in the past.
    </p>

    <img src="FPU.JPG" width="60%" style="margin: auto;display: block;">

</div>


<div class="form" id="loginForm">
    <!--
        This is the user login form
    -->
    <h2>Sign in</h2>
    <form method="post" action="page2.php">
        <label>Username: </label>
        <input type="text" name="username">
        <br>
        <label>Password: </label>
        <input type="password" name="password">
        <br>
        <input type="submit">
    </form>


</div>

<div id="signupIndexPage">
    <div style="margin-bottom: 50px; font-weight: bold">New To Rate My Course?</div>
    <div style="border: 1px solid brown;" ><a href="signupPage.php">Signup Here</a></div>
</div>




</body>
</html>


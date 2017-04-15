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
   header("Location: errorPage1.php");
}
else {
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
    <div>
        We did it!!!
    </div>

    <div class="logoutForm">
        <form method="post" action="logout.php">

            <input type="submit" value="Logout">
        </form>


    </div>

    </body>
    </html>

    <?php
}
    ?>
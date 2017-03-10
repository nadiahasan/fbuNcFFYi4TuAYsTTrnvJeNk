<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 4:41 PM
 *
 * Purpose: This file handles logout process. The page still contains the
 *          search form since a logged-out user can still search for a course
 *          after logout.
 */



// start and destroy the session to close any other sessions that might be open
session_start();
session_unset();
session_destroy();

?>

<html>
<body>
<div class="form" id="searchForm">

    <!-- search form -->
    <form method="post" action="searchResults.php">
        <label>Search for a course: </label>
        <input type="text" name="courseToSearch">
        <br>
    </form>

</div>

<div>
    See you soon.
</div>

</body>
</html>
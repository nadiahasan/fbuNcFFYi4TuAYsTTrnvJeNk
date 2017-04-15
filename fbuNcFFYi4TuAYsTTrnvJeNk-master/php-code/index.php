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
<style>

body {
    background-color: #32CD32;
}

</style>
</head>
<body>


<div class="form" id="searchForm">

    <!--
        This is the search form
    -->
<form method="post" action="searchResults.php">
    <label>Search for a course: </label>
    <input type="text" name="courseToSearch">
    <br>
</form>

</div>

<div class="form" id="loginForm">

    <!--
        This is the user login form
    -->

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




</body>
</html>


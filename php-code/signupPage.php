<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 3/9/17
 * Time: 1:19 PM
 * Purpose: This file represents the signup page. It contains the signup form
 */

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>

<body>

<?php
include "topMenu.php";
?>
<div class="form" id="signupForm">

<h3>Signup Form</h3>
    <!-- Signup form -->
    <form method="post" action="userSignup.php">
        <label style="margin-bottom: 20px">Username: </label>
        <input type="text" name="username" required style="margin-bottom: 10px">
        <br>
        <label style="margin-bottom: 20px">Password: </label>
        <input type="password" name="password" required style="margin-bottom: 20px">
        <br>
        <label style="margin-bottom: 20px">Email</label>
        <input type="email" name="email" required style="margin-bottom: 20px">
        <br>
        <label style="margin-bottom: 20px">First Name:</label>
        <input type="text" name="firstName" required style="margin-bottom: 20px">
        <br>
        <label style="margin-bottom: 20px">Last Name:</label>
        <input type="text" name="lastName" required style="margin-bottom: 20px">
        <br>
        <input type="submit" style="margin-bottom: 20px">
    </form>


</div>




</body>
</html>


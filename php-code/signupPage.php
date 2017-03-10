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

</head>

<body>


<div class="form" id="signupForm">


    <!-- Signup form -->
    <form method="post" action="userSignup.php">
        <label>Username: </label>
        <input type="text" name="username" required>
        <br>
        <label>Password: </label>
        <input type="password" name="password" required>
        <br>
        <label>Email</label>
        <input type="email" name="email" required>
        <br>
        <label>First Name:</label>
        <input type="text" name="firstName" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastName" required>
        <br>
        <input type="submit">
    </form>


</div>




</body>
</html>


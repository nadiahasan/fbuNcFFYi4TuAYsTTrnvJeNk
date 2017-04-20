<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Author: Nadia Hasan
 * Date: 4/16/17
 * Time: 8:58 PM
 * Purpose: This file displays a menu for registered users, with logout button.
 *          It also displays a link to main page, displayed for all users.
 */


?>


<html>
<head>

    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>
<body>
<a href="main.php">Home</a>




<?php
if (isset($_SESSION['username'])) {
    ?>

    <div class="logoutForm">
        <form method="post" action="logout.php">

            <input type="submit" value="Logout">
        </form>
    </div>
    <?php
}
?>

</body>
</html>

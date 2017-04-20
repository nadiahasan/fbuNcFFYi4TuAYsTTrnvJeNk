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

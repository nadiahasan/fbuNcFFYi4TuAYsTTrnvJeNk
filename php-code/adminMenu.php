<?php
$sql_command="select * from USERS where USERNAME='".$_SESSION['username']."' and PRIVILEGE_LEVEL=1;";

$result = $conn->query($sql_command); // submitting query to database


if($result->num_rows !==0) {


    ?>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
    </head>
    <body>



    <div id="mainFrame" class="form">

        <div>
            <a href="pendingUsersPage.php" style="margin-right: 10px;">Pending Users</a>
            <a href="currentUsersPage.php"style="margin-right: 10px;">Current Users</a>
            <a href="abuseReports.php" style="margin-right: 10px;">Abuse Reports</a>
            <a href="currentCoursesPage.php" style="margin-right: 10px;">Manage Courses</a>
            <a href="backup.php">Backup</a>

        </div>

    </div>
    </body>
    </html>
    <?php
}
?>
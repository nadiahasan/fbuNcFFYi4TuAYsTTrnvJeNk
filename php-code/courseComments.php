<?php
/**
 * Created by PhpStorm.
 * User: nadiahasan
 * Date: 4/15/17
 * Time: 12:50 PM
 */
session_start(); // start session

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

include "adminMenu.php";

if(isset($_POST['commentAction'])){
    $course_id=explode("___",$_POST['commentAction']);
    $course_id=$course_id[1];

    $sql_command= "INSERT INTO USER_COMMENT VALUES(1,'".$_SESSION['username']."','".$_POST['cbody']."',NOW(), -1, '".$course_id."',0 );";

    $result = $conn->query($sql_command); // submitting query to database
    $sql_command = "select * from COURSE WHERE COURSE_ID='" . $course_id. "';";
    $result = $conn->query($sql_command); // submitting query to database
    $row = $result->fetch_assoc();
}else if(isset($_POST['ratingAction'])){

    $course_id=explode("___",$_POST['ratingAction']);
    $course_id=$course_id[1];

    $sql_command= "INSERT INTO COURSE_RATINGS VALUES(". $_POST['diff']. ",".$_POST['recommend'].",'".$course_id."','".$_SESSION['username']."');";

    $result = $conn->query($sql_command); // submitting query to database

    $sql_command = "select * from COURSE WHERE COURSE_ID='" . $course_id. "';";
    $result = $conn->query($sql_command); // submitting query to database
    $row = $result->fetch_assoc();
} else{

    // trying to extract the course id of the current page
    $sql_command = "select * from COURSE WHERE COURSE_ID='" . $_GET['id'] . "';";
    $result = $conn->query($sql_command); // submitting query to database
//User trying to access a course for which a code does not exist
    if ($result->num_rows <= 0) {
        die("Unauthorized access");
    }
    $row = $result->fetch_assoc();
    $course_id=$_GET['id'];
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="rateMyCourse.css">
</head>
<body id="courseCommentsBody">
<?php
include "topMenu.php";

?>
<div style="background-color: ivory; width: 50%;">
    <table>
        <tr>
            <td style="font-weight: bold">Course Name:</td>
            <td><?php echo $row['COURSE_NAME']; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold">Course Description:</td>
            <td><?php echo $row['COURSE_DESCRIPTION']; ?></td>
        </tr>
        <tr>
            <?php
            $sql_command = "select avg(LEVEL_OF_DIFFICULTY) AS difficulty from COURSE_RATINGS WHERE COURSE_ID='" . $course_id . "';";

            $result = $conn->query($sql_command); // submitting query to database
            if ($result->num_rows == 0) {
                $diff = 0;
            } else {
                $row = $result->fetch_assoc();
                $diff = $row['difficulty'];
            }


            ?>

            <td style="font-weight: bold;">Rating:</td>
            <td><?php echo $diff; ?></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Comments:</td>
            <td>

                <?php
                $sql_command = "select * from USER_COMMENT WHERE COURSE_ID='" . $course_id . "';";
                $result = $conn->query($sql_command); // submitting query to database
                if ($result->num_rows == 0) {
                } else {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <table style="border: 1px solid brown; width: 100%;">
                            <tr>
                                <td style="font-weight: bold;">Username</td>
                                <td><?php echo $row['USERNAME']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Date:</td>
                                <td><?php echo $row['COMMENT_DATE']; ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Comment:</td>
                                <td><?php echo $row['COMMENT_BODY']; ?></td>
                            </tr>
                            <br/>
                            <tr><td><form method="post" action="reportAbuseForm.php"><button type="submit" name="report" value="<?php echo $row['USERNAME']."___".$row['COURSE_ID']."___".$row['COMMENT_ID'] ?>" style="margin-top: 20px;">Report Comment</button></form></td></tr>
                        </table>
                        <?php
                    }

                }
                ?>
            </td>
        </tr>


    </table>
    <br/>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <form method="post" action="courseComments.php">
            <label style="font-weight: bold">Comment:</label>
            <br/>
            <textarea rows="5" name="cbody" required style="width: 500px;"></textarea>
            <br/>
            <br/>
            <button type="submit" name="commentAction" value="addComment___<?php echo $course_id; ?>">Add Comment</button>

            </form>

            <form method="post" action="courseComments.php">
                <label style="margin-bottom: 20px; margin-top: 20px;">Level of difficulty: </label>
                <input type="text" name="diff" required style="margin-bottom: 10px">
                <br/>

                <label style="margin-bottom: 20px">Do you recommend this course: </label> <br/>


                <input type="radio" name="recommend" value="1" checked>Yes<br>
                <input type="radio" name="recommend" value="0">No<br>
                <br/>
                <button type="submit" name="ratingAction" value="addRating___<?php echo $course_id; ?>">Add Rating</button>


            </form>



        <?php
    }
    ?>
    <br/>

</div>
</body>
</html>


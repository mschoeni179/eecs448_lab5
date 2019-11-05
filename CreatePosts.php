<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = $_POST["id"];
$post = $_POST["post"];
$data = "SELECT userID FROM Users;";
$result = $mysqli->query($data);
$flag = false;
while($row = $result->fetch_assoc())
    {
        if ($row[userID] == $user)
        {
            $flag = true;
        }
    }
    if ($flag)
    {
        $sql = "INSERT INTO Posts (content, author_id) VALUES ($post, $user);";
        echo "Post created";
        echo "<a href='AdminHome.html'>Back to Admin Home </a>";
    }
    else
    {
    echo "Error, user not found\n";
    echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
    }

/* close connection */
$mysqli->close();
?>

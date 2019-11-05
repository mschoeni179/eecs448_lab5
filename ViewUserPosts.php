<?php

function getUser() 
{
    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $data = "SELECT * FROM Users;";
    $result = $mysqli->query($data);
    if ($result)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<option value=" . $row['user_id'] . ">"  . $row['user_id'] . "</option>";
        }
    }
    else
    {
        echo "No user found";
    }
    $mysqli->close();
}




    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $users = $_POST["user"];
    $data = "SELECT * FROM Posts WHERE author_id='$users';";
    $result = $mysqli->query($data);
    echo "Showing table of posts made by " . $users . "<br>";
    echo "<table style='border: 1px'>";
    echo "<tr><td>PostID</td><td><td>Posts</td></tr>";
    if ($result)
    {
        while($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td></tr>";
		}
        echo "</table><br><br> ";
        $result->free();
    }
    else
    {
        echo "No user posts found";
    }

    echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";

    $mysqli->close();

    
?>

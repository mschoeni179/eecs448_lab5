<?php
    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $users = $_POST["users"];
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
        echo "</table> ";
        $result->free();
    }
    else
    {
        echo "No user posts found";
    }

    $mysqli->close();

    
?>

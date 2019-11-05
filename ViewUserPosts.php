<?php

    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    if(isset($_POST['submit']))
    {
      $users = $_POST["user"];
    }
    $data = "SELECT * FROM Posts WHERE author_id='$users';";
    $result = $mysqli->query($data);
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

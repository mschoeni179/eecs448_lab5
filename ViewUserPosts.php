<?php
    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

      $user = $_POST['user'];

    $data = "SELECT * FROM Posts WHERE author_id='$user';";
    echo "Displaying posts from user " . $user . "<br><br><br>";
    if ($result = $mysqli->query($data))
    {
      echo "<table border='1'><tr><th>PostID </th><th>Post </th></tr>";
        while($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["postID"] . "</td><td>" . $row["content"] . "</td></tr>";
		}
        echo "</table><br><br> ";
        $result->free();
    }
    else
    {
        echo "No user found";
    }

    echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";

    $mysqli->close();


?>

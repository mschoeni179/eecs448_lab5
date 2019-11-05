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
$data = "SELECT userID FROM Users WHERE userID='$user';";
$flag = false;
if($result = $mysqli->query($data))
{
	if($row = $result->fetch_assoc())
	{
		if($row["userID"] == $user)
		{
			$flag = true;
		}
    }
}
else
{
    echo "Error, user not found\n";
    echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
}

if ($flag)
{
        $sql = "INSERT INTO Posts(content, author_id) VALUES ('$post', '$user');";
        $query = $mysqli->query($sql);
        if ($query)
        {
            echo "Post created";
            echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
        }
        else
        {
            echo "An error occurred. <br>";
            echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
        }
        
}
// $result = $mysqli->query($data);
// $flag = FALSE;
// while($row = $result->fetch_assoc())
//     {
//         if ($row[userID] == $user)
//         {
//             $flag = TRUE;
//         }
//     }
//     if ($flag)
//     {
//         $sql = "INSERT INTO Posts(content, author_id) VALUES ('$post', '$user');";
//         $query = $mysqli->query($sql);
//         if ($query)
//         {
//             echo "Post created";
//             echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
//         }
//         else
//         {
//             echo "An error occurred. <br>";
//             echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
//         }
        
//     }
//     else
//     {
//     echo "Error, user not found\n";
//     echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
//     }

/* close connection */
$mysqli->close();
?>

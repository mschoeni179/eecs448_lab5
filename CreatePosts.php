<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "malena");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user = $_POST["id"];
$post = $_POST["post"];
$data = "SELECT userID FROM Users";
$result = $mysqli->query($data);
$flag = false;
$postID = $user*2+13;

if ($result->num_rows >0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        if ($row[userID] == $user)
        {
            $flag = true;
        }
    }
    if ($flag)
    {
        $sql = "INSERT INTO Posts (postID, content, author_id) VALUES ($postID, $post, $user)";
    }
    else
    {
    echo "Error, user not found\n";
    }
}
else
{
    echo "Error, user not found\n";
}


/* close connection */
$mysqli->close();

?>
<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "malena");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$data = "SELECT userID FROM Users";
$result = $mysqli->query($data);
$user = $_POST["id"];

if ($result->num_rows >0)
{
  while($row = mysqli_fetch_assoc($result))
  {
        if ($row[userID] == $user)
        {
            echo "Error, user already inserted into database\n";
        }
  }
}
else
{
  $sql = "INSERT INTO Users (userID) VALUES ($user)";
}


/* close connection */
$mysqli->close();

?>

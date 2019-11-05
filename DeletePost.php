<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT postID FROM Posts ORDER BY postID;";
$toDelete = $_POST['delete'];

foreach ($toDelete as $key )
{
  $data = "DELETE FROM Posts WHERE postID='$key';";
  if ($result = $mysqli->query($data))
  {
    echo "The post with an ID of " . $key . " has been successfully deleted<br><br>";
  }
}
echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
$mysqli->close();

  ?>

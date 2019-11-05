<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$delete = 0;
$query = "SELECT post_id FROM Posts ORDER BY post_id;";
$index = 0;
if ($result = $mysqli->query($query))
{
  while ($row = $result->fetch_assoc())
  {
    $index +=1;
    $delete=$row[post_id];
    $nextQuery = "DELETE FROM Posts WHERE post_id='".$delete."'";
    if(isset($_POST["post".$index.""]))
    {
      $mysqli->query($nextQuery);
      echo "Post ID: '".$delete."' was deleted.<br>";
      }
  }
  $result->free();
}
$mysqli->close();

//need stuff to get the checkboxes from html page but then

  ?>

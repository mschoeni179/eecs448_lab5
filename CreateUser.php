<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user = $_POST["id"];
$flag = false;

$sql = "INSERT INTO Users (userID) VALUES ($user);";
    if ($mysqli->query($sql) === TRUE)
    {
      echo "User created successfully";
    }
    else
    {
      echo "Error, user not created. User already exists";
    } 
  


/* close connection */
$mysqli->close();

?>

<?php
$myPass = "seishae4";
$mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$data = "SELECT userID FROM Users";
$result = $mysqli->query($data);

echo "<table border='1' style ='border: 1px solid black'><tr><th>Username</th></tr>";
if ($result)
{
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td> " . $row["userID"] . "</td></tr>";
    }
    echo "</table> ";
}
else
{
    echo "No user found";
    echo "<br><a href='AdminHome.html'>Back to Admin Home </a>";
}
$result->free();



/* close connection */
$mysqli->close();

?>

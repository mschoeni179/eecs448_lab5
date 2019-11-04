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

echo "<table><tr><th>Username</th></tr>";
if ($result->num_rows >0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr><td>" . $row["userID"] . "</td></tr>";
    }
    echo "</table>";
}
else
{
    echo "Error, user not found\n";
}


/* close connection */
$mysqli->close();

?>

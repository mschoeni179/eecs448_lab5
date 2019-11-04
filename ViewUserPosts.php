<?php
    $myPass = "seishae4";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "msch179", $myPass, "msch179");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $data = "SELECT userID FROM Users";
    $result = $mysqli->query($data);
    echo "<table>";
    if ($result->num_rows >0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<option>" . $row["userID"] . "</option>";
        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</select> ";
    }
    else
    {
        echo "Error, user not found\n";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PSC - Staff : Add Room</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<h1>PSC - Staff Access : Add Room</h1>
<?php
   include 'connectdb.php';
?>
<h1>Here are your movies:</h1>
<ol>
<?php
   $roomCapacity = $_POST["newroomcap"];
   $roomNumber = $_POST["RoomNumber"];
   $query = 'select max(RoomNumber) as maxid from TheatreRooms';
   $result=mysqli_query($connection,$query);
   if (!$result) {
        die("database max query failed.");
        }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $RoomID = (string)$newkey;
   $query = 'insert into TheatreRooms values("' . $RoomID . '","' . $roomCapacity . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
        }
        echo "Room " . $RoomID . " was added!";

   mysqli_close($connection);
?>
</ol>

<p><a href="staff.php">&larr; Return to staff page</a></p>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>PSC - Staff : Delete Rooms</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<h1>PSC - Staff Access : Delete Rooms</h1>
<hr>
<?php
    include '../../connectdb.php';
    
    if (isset($_POST['therooms'])) {
        
        function IsChecked($chkname,$connection)  {
            if (!empty($_POST[$chkname]))  {
                foreach($_POST[$chkname] as $value) {
                    $delsql="delete from TheatreRooms where RoomNumber='" . $value . "'";
                    deleteRoom($delsql,$connection,$value);
                }
            }
        }
        
        function deleteRoom($deleteCommand,$conn,$val) {
            if (mysqli_query($conn,$deleteCommand)) {
                echo "<p>Room " . $val . " deleted successfully</p>";
            } else {
                echo "<p>Problem with deleting room: " . mysqli_error($conn) . "</p>";
            }
        } //end of deleteMovie function
        
        IsChecked('therooms',$connection);
    } else {
        echo '<p>Error: you must select a room.</p>';
    }
    mysqli_close($connection);
?>
<p><a href="../staff.php">&larr; Return to staff page</a></p>
</body>
</html>

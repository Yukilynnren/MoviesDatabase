<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>PSC - Staff : Update Room</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<h1>PSC - Staff Access : Update Room</h1>
<hr>
<?php
    include '../inc/getwhichroom.inc.php';
    
    if ($roomSelected) :
?>
    <form  action="updatearoom.php" method="post">
    <h2>Update Room Number <?php echo $selected_room ?> </h2>
    Room Capacity: <input type="number" name="roomcap" value="<?php echo ( htmlspecialchars( $roomcapacity)); ?>" />
    <br>
    <input type="hidden" name="roomnum" value="<?php echo ( htmlspecialchars( $selected_room)); ?>" />
    <input type="submit" value="Update this room">
    <br>
    </form>
<?php
	endif;
?>
</body>
</html>

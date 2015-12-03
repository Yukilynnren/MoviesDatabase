<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>PSC - Staff : <?php echo($_POST['method']) ?> Movies</title>
</head>
<body>
<h1>PSC - Staff Access : <?php echo($_POST['method']) ?> Movies</h1>
<hr>
<?php
    include 'connectdb.php';
    
    // List movies
    if (isset($_POST['method'])) {
        $result = mysqli_query($connection, 'SELECT * FROM Movies');
        
        if ($_POST['method'] == "Delete") {
            $action = "deletemovie.php";
        } else {
            $action = "updatemovies.php";
        }
        
        if (mysqli_num_rows($result) > 0) {
            echo '<form action="' . $action . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete?\');"><table><thead><tr><th></th><th>Movie ID</th><th>Title</th><th>Year</th></tr></thead><tbody>';
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td><input type="checkbox" name="themovies[]" value="' . $row['MovieID'] . '"></td><td>' . $row['MovieID'] . '</td><td>' . $row['MovieName'] . '</td><td>' . $row['Year'] . '</td></tr>';
            }
            echo '</tbody></table><br><input type="submit" value="' . $_POST['method'] . ' Movies"></form>';
        } else {
            echo '<p>There are no movies!</p>';
        }
    }
    
    mysqli_close($connection);
?>
</body>
</html>
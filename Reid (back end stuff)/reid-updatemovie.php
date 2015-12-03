<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>PSC - Staff : Update Movies</title>
</head>
<body>
<h1>PSC - Staff Access : Update Movies</h1>
<hr>
<?php
    include 'connectdb.php';
    
    // Get current movie data
    if (isset($_POST['method'])) {
        $result = mysqli_query($connection, 'SELECT * FROM Movies');
        
        if (mysqli_num_rows($result) > 0) {
            echo '<form action="updatemovie.php" method="POST"><table><thead><tr><th></th><th>Movie ID</th><th>Title</th><th>Year</th></tr></thead><tbody>';
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                
                // for each result, get the genres with that MovieID and check checkboxes accordingly
                
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
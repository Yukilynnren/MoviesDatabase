<?php
  include 'folder.inc.php';
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);  
  $extension = strtolower($extension);
  $uploadholder = dirname(__FILE__) . "/upload";
  $uploadFolder = new Folder;
  if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 500000)
      && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                        $uploadFolder->createFolder($uploadholder);
                        if (file_exists($uploadholder . "/" . $_FILES["file"]["name"])) {
                                    echo '<p>Error: ';
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                    echo '</p>';
                                    $posterpic = "NULL";
                                    $cancelAdd = True;
                        } else {
                                    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadholder . "/" . $_FILES["file"]["name"]);
                                    $posterpic = "/MoviesDatabase/back-end/inc/upload/" . $_FILES["file"]["name"];
                        } // end of else
            } // end of else
     } elseif ($_FILES["file"]["name"]) {
            echo "<p>Invalid file</p>";
            $posterpic = "NULL";
    } else {
        $posterpic = "NULL";
    } //end of else
?>

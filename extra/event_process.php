<?php
require 'config.php';
    /*===========================Data Fetch===========================*/

    $Event_Name = $_POST['EventName'];
    $Event_Date = $_POST['date'];
    $Event_Info = $_POST['event_info'];

    /*======================Image=====================*/
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    /*===========================Check if image file is a actual image or fake image2wbmp(image)======================*/
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
//            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
//            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    /*=======================================Check if file already exists============================================*/
    if (file_exists($target_file)) {
//        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    /*=======================================Check file size=========================================================*/
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
//        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    /*=======================================Allow certain file formats==============================================*/
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
//        echo "Sorry, your file was not uploaded.";
    /*===========================================if everything is ok, try to upload file==============================*/
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
//            echo "Sorry, there was an error uploading your file.";
        }
    }

    $insert_sql = "INSERT INTO `events` (`event_name`, `event_description`, `event_image`, `event_date`)VALUES('$Event_Name','$Event_Info','$target_file','$Event_Date')";
     echo $insert_sql;

if (isset($conn)) {
    $result = $conn->query($insert_sql);
}
    if ($result){
        echo 'Data Inserted';
        header('Location:add_event.php');
    }else{
        echo '<script>alert("Error Occured")</script>';
        header('Location:add_event.php');
    }

?>
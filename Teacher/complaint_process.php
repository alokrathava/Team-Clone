<?php
    require 'config.php';
    /*============Data Fetch===========*/
    $student = $_POST['student'];
    $teacher = $_POST['teacher'];
    $complaint = $_POST['complaint'];

//    echo $student,$teacher,$complaint;
    /*============Query===========*/
    $complaint_sql = "INSERT INTO `complaint` (`st_id`,`t_id`,`comp_description`) VALUES ('$student','$teacher','$complaint')";
    echo $complaint_sql;
if (isset($conn)) {
    $result = $conn->query($complaint_sql);
}

if (isset($result)) {
    if ($result)
    {
        header('Location:complaint.php');
    }
    else
    {
        echo '<script>alert("ERROR OCCURED")</script>';
        header('Location:complaint.php');
    }
}
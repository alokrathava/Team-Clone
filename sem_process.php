<?php


if (isset($_POST['submit'])) {

    include 'config.php';

    //extract($_POST);


        $c_id = $_POST['c_id'];
        $dep_id = $_POST['dep_id'];
    $s_name = $_POST['s_name'];


    $sql = "INSERT INTO `sem`(`dep_id`, `c_id`,`s_name`) VALUES('$dep_id','$c_id','$s_name')";
    if (isset($conn)) {
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        header('location:sem_list.php');
    } else {
        echo "<script>alert('failed');</script>";
    }

}


?>
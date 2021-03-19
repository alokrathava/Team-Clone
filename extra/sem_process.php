<?php


if (isset($_POST['submit'])) {

    include 'config.php';

    //extract($_POST);


        $cid = $_POST['cid'];
        $did = $_POST['did'];
    $sname = $_POST['s_name'];


    $sql = "INSERT INTO `sem`(`dep_id`, `c_id`,`s_name`) VALUES('$cid','$did','$sname')";
    if (isset($conn)) {
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        header('location:sem_add.php');
    } else {
        echo "<script>alert('failed');</script>";
    }

}


?>
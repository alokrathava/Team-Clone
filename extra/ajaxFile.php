<?php
//Include database configuration file
include('config.php');

if (isset($_POST["dep_id"])) {
    //Get all state data
    $dep_id = $_POST['dep_id'];
    $query = "SELECT * FROM course WHERE dep_id = '$dep_id' 
	ORDER BY c_name ASC";
    $run_query = mysqli_query($conn, $query);

    //Count total number of rows
    $count = mysqli_num_rows($run_query);

    //Display states list
    if ($count > 0) {
        echo '<option value="">Select course</option>';
        while ($row = mysqli_fetch_array($run_query)) {
            $c_id = $row['c_id'];
            $c_name = $row['c_name'];
            echo "<option value='$c_id'>$c_name</option>";
        }
    } else {
        echo '<option value="">course not available</option>';
    }
}

if (isset($_POST["c_id"])) {
    $c_id = $_POST['c_id'];
    //Get all city data
    $query = "SELECT * FROM sem WHERE c_id = '$c_id' 
	ORDER BY s_name ASC";
    $run_query = mysqli_query($conn, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);

    //Display cities list
    if ($count > 0) {
        echo '<option value="">Select semester</option>';
        while ($row = mysqli_fetch_array($run_query)) {
            $s_id = $row['s_id'];
            $s_name = $row['s_name'];
            echo "<option value='$s_id'>$s_name</option>";
        }
    } else {
        echo '<option value="">semester not available</option>';
    }
}


if (isset($_POST["sem_id"])) {

    $sem_id = $_POST['sem_id'];
    //echo "<script>alert('".$sem_id."');</script>";

    $query = "SELECT * FROM subject WHERE sem_id ='$sem_id' ORDER BY sub_name ASC";
    $run_query = mysqli_query($conn, $query);

    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
        echo '<option value="">Select Subject</option>';
        while ($row1 = mysqli_fetch_array($run_query)) {
            $s_id = $row1['sub_id'];
            $sub_name = $row1['sub_name'];
            echo "<option value='$s_id'>$sub_name</option>";
        }
    } else {
        echo '<option value="">No Subject</option>';
    }
}


?>
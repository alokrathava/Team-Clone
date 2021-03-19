<?php
include('config.php');
session_start();
if ($_POST['user_type'] == 'HOD') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM admin_login WHERE email='$email' and pass='$pass'";
    $res = mysqli_query($conn, $sql);

    if ($res->num_rows > 0) {
        while ($r1 = $res->fetch_assoc()) {
            $r_email = $r1['email'];
        }
        $_SESSION['email'] = $r_email;
        header("Location: home.php");
    } else {
        echo '<script type="text/javascript">alert("Email Id And Password Wrong ")</script>';
        echo '<script type="text/javascript">window.location ="index.php"</script>';
    }
}

if ($_POST['user_type'] == 'Teacher') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM teacher_reg WHERE email='$email' and pass='$pass'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

            $teacher_id = $row['teacher_id'];
            $_SESSION['teacher_id'] = $teacher_id;
            $department_id = $row['dep_id'];
            $_SESSION['department_id'] = $department_id;
            $course_id = $row['c_id'];
            $_SESSION['course_id'] = $course_id;
            $name = $row['name'];
            $_SESSION['name'] = $name;
        }
        header("Location: Teacher/index.php");
    } else {
        echo '<script type="text/javascript">alert("Email Id And Password Wrong ")</script>';
        echo '<script type="text/javascript">window.location ="index.php"</script>';
    }
}
?>
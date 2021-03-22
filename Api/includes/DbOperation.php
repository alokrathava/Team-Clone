<?php

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    /*
    * The create operation
    * When this method is called a new record is created in the database
    */


    public function getConn()
    {
        return $this->con;
    }

    /*-----------------------------------------------Student LOGIN---------------------------------------------------*/
    function StudentLogin($email, $pwd)
    {
        $sql = "SELECT * FROM `student_reg` where s_email='$email' and s_password='$pwd'";
        $stmt = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($stmt);
        if ($num > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*-----------------------------------------------Student Registration---------------------------------------------------*/
    function StudentRegistration($s_name, $s_enroll_no, $s_phone, $s_address, $s_email, $s_password, $s_city, $s_state, $s_semester, $s_department, $s_course)
    {

        $sql = "INSERT INTO `student_reg` (`s_name`, `s_enroll_no`, `s_phone`, `s_address`, `s_email`, `s_password`, `s_city`, `s_state`, `s_semester`, `s_department`, `s_course`)
                VALUES ('$s_name', '$s_enroll_no', '$s_phone', '$s_address', '$s_email', '$s_password', '$s_city', '$s_state', '$s_semester', '$s_department', '$s_course')";
        $result = mysqli_query($this->con, $sql);
        if ($result) {

            return true;
        } else {

            return false;
        }

    }

    /*-----------------------------------------------Teacher Registration---------------------------------------------------*/
    function TeacherRegistration($t_name, $t_phone, $t_address, $t_email, $t_password, $t_city, $t_state, $t_department, $t_course)
    {

        $sql = "INSERT INTO `teacher_reg` ( `t_name`, `t_phone`, `t_address`, `t_email`, `t_password`, `t_city`, `t_state`, `t_department`, `t_course`)
                VALUES ('$t_name', '$t_phone', '$t_address', '$t_email', '$t_password', '$t_city', '$t_state', '$t_department','$t_course')";
        $result = mysqli_query($this->con, $sql);
        if ($result) {
            return true;
        } else {

            return false;
        }

    }


    /*-----------------------------------------------Teacher LOGIN---------------------------------------------------*/
    function TeacherLogin($email, $pwd)
    {

        $sql = "SELECT * FROM `teacher_reg` where t_email ='$email' and t_password ='$pwd'";
        $stmt = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($stmt);
        if ($num > 0) {

            return true;
        } else {

            return false;
        }

    }

    /*-----------------------------------------------Department Data---------------------------------------------------*/
    function getDepartmentData()
    {
        $stmt = "SELECT * FROM `deparment`";
        $result = $this->con->query($stmt);
        $outer = array();
        while ($obj = $result->fetch_object()) {
            $inner = array();
            $inner['dep_id'] = $obj->dep_id;
            $inner['d_name'] = $obj->d_name;
            array_push($outer, $inner);
        }
        return $outer;
    }

    /*-----------------------------------------------Course Data---------------------------------------------------*/
    function getCourseData($d_id)
    {
        $stmt = "SELECT * FROM `course` WHERE dep_id ='$d_id'";
        $result = $this->con->query($stmt);
        $outer = array();
        while ($obj = $result->fetch_object()) {
            $inner = array();
            $inner['c_id'] = $obj->c_id;
            $inner['dep_id'] = $obj->dep_id;
            $inner['c_name'] = $obj->c_name;
            array_push($outer, $inner);
        }
        return $outer;
    }

    /*-----------------------------------------------Course Data---------------------------------------------------*/
    function getSemesterdata($dep_id, $c_id)
    {
        $stmt = "SELECT * FROM `sem` WHERE 	dep_id='$dep_id' AND c_id='$c_id'";
        $result = $this->con->query($stmt);
        $outer = array();
        while ($obj = $result->fetch_object()) {
            $inner = array();
            $inner['s_id'] = $obj->s_id;
            $inner['dep_id'] = $obj->dep_id;
            $inner['c_id'] = $obj->c_id;
            $inner['s_name'] = $obj->s_name;
            array_push($outer, $inner);
        }
        return $outer;
    }

    /*-----------------------------------------------Student Data ---------------------------------------------------*/
    function getStudentData($email, $password)
    {
        $stmt = "SELECT * FROM `student_reg` where s_email ='$email' and s_password ='$password'";
        $result = $this->con->query($stmt);
        $outer = array();
        while ($obj = $result->fetch_object()) {
            $outer['s_id'] = $obj->s_id;
            $outer['s_name'] = $obj->s_name;
            $outer['s_enroll_no'] = $obj->s_enroll_no;
            $outer['s_phone'] = $obj->s_phone;
            $outer['s_address'] = $obj->s_address;
            $outer['s_email'] = $obj->s_email;
            $outer['s_semester'] = $obj->s_semester;
            $outer['s_department'] = $obj->s_department;
            $outer['s_course'] = $obj->s_course;
            $outer['status'] = $obj->status;
        }
        return $outer;
    }

    /*-----------------------------------------------Teacher Data ---------------------------------------------------*/
    function getTeacherData($email, $password)
    {
        $stmt = "SELECT * FROM `teacher_reg` where t_email ='$email' and 	t_password ='$password'";
        $result = $this->con->query($stmt);
        $outer = array();
        while ($obj = $result->fetch_object()) {
            $outer['t_id'] = $obj->t_id;
            $outer['t_name'] = $obj->t_name;
            $outer['t_phone'] = $obj->t_phone;
            $outer['t_address'] = $obj->t_address;
            $outer['t_email'] = $obj->t_email;
            $outer['t_department'] = $obj->t_department;
            $outer['t_course'] = $obj->t_course;
            $outer['status'] = $obj->status;
        }
        return $outer;
    }

    /*===================================================Time Table===================================================*/
    public
    function getTimeTabedata($day, $department, $course)
    {
        $stmt = "SELECT time_table.t_id, deparment.d_name, course.c_name, sem.s_name, subject.sub_name, resource.re_name, time_slots.s_time, time_slots.e_time, teacher_reg.t_name FROM `time_table`
                 JOIN deparment ON deparment.dep_id = '$department' 
                 JOIN course ON course.c_id = '$course' 
                 JOIN sem ON sem.s_id = time_table.sem_id 
                 JOIN subject ON subject.sub_id = time_table.sub_id 
                 JOIN resource ON resource.re_id = time_table.res_id 
                 JOIN time_slots ON time_slots.slots_id = time_table.time_slot 
                 JOIN teacher_reg ON teacher_reg.t_id = time_table.tech_id 
                 WHERE day='$day'";

        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {

            $inner = array();
            $inner['t_id'] = $obj->t_id;
            $inner['d_name'] = $obj->d_name;
            $inner['c_name'] = $obj->c_name;
            $inner['s_name'] = $obj->s_name;
            $inner['sub_name'] = $obj->sub_name;
            $inner['re_name'] = $obj->re_name;
            $inner['s_time'] = $obj->s_time;
            $inner['e_time'] = $obj->e_time;
            $inner['t_name'] = $obj->t_name;

            array_push($outer, $inner);
        }

        return $outer;
    }


    /*===================================================Events===================================================*/
    public
    function event()
    {
        $stmt = "SELECT * FROM `event`";
        $result = $this->con->query($stmt);

        $outer = array();

        while ($obj = $result->fetch_object()) {

            $inner = array();
            $inner['event_id'] = $obj->event_id;
            $inner['event_name'] = $obj->event_name;
            $inner['event_description'] = $obj->event_description;
            $inner['event_image'] = $obj->event_image;
            $inner['event_date'] = $obj->event_date;

            array_push($outer, $inner);
        }

        return $outer;
    }
}

<?php
    require_once "../../../Class/autoload.php";
    if($_POST){
        var_dump($_POST);
        $name = $_POST['name'];
        $code = $_POST['code'];
        $badgeName = $_POST['badgeName'];
        $course = new Course($code, $name, $badgeName);
        $courseDAO = new CourseDAO();
        $courseRunDAO = new CourseRunDAO();
        try{
            $courseDAO->addCourse($course);
        }catch(Exception $e){

        }
    }
    header("Location:./../ManageClass.html");
    exit();
?>
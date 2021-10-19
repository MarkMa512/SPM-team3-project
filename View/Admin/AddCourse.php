<?php
    require_once "../../Class/autoload.php";
    if($_POST){
        var_dump($_POST);
        $name = $_POST['name'];
        $code = $_POST['code'];
        $badgeName = $_POST['badgeName'];
        $course = new Course($name, $code, $badgeName);
        $courseDAO = new CourseDAO();
        $courseDAO->addCourse($course);
    }
    header("Location:./ManageClass.php");
    exit();
?>
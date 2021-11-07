<?php
require_once "../../../Class/autoload.php";
session_start();
//print_r($_GET);

if($_GET){
    $courseDAO = new CourseDAO();
    $coursePost = new Course($_GET["code"], $_GET["name"], $_GET["badgeName"]);
    // print_r($coursePost);
    $result = $courseDAO->updateCourse($coursePost);

    // $_SESSION["update_status"] = $_GET["code"]."Update Successfully";
}else{
    echo "{error: 'no update'}";
}
header("Location:./../ManageClass.html");
exit();

?>
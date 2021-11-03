<?php
require_once "../../../Class/autoload.php";
session_start();
var_dump($_GET);
if($_GET){
    $courseDAO = new CourseDAO();
    $coursePost = new Course($_GET["code"], $_GET["name"], $_GET["badgeName"]);
    var_dump($coursePost);
    $result = $courseDAO->updateCourse($coursePost);
    // var_dump($_GET);
    // $_SESSION["update_status"] = $_GET["code"]."Update Successfully";
}else{
    echo "{error: 'no update'}";
}
header("Location:./../ManageClass.html");
exit();

?>
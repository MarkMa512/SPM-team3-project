<?php
require_once "../../../Class/autoload.php";
var_dump($_GET);
if($_GET){
    $courseDAO = new CourseDAO();
    $coursePost = new Course($_GET["code"], $_GET["name"], $_GET["badgeName"]);
    $result = $courseDAO->updateCourse($coursePost);
    var_dump($_GET);
}else{
    echo "Noth9ng";
}
header("Location:./../ManageClass.html");
exit();

?>
<?php
require_once "../../Class/autoload.php";
if($_GET){
    $courseDAO = new CourseDAO();
    $coursePost = new Course($_POST["code"], $_POST["name"], $POST["badgeName"]);
    $result = $courseDAO->updateCourse($coursePost);
    var_dump($_POST);
}else{
    echo "Noth9ng";
}
// header("Location:./UpdateCourse.php?coursecode={$_POST['code']}");
exit();

?>
<?php 
require_once "../../../Class/autoload.php";
session_start();

$courseRunDAO = new CourseRunDAO();
$courses = $courseRunDAO->getCourseRun("SR101");
$courseDao = new CourseDAO();
$result = [];
foreach ($courses as $info){
    $name = $courseDao->getCourseByID($info->getCourseCode())->getCourseName();

    $result[] = [
        "courseCode"=>$info->getCourseCode(),
        "courseRunID"=>$info->getCourseRunID(),
        "startDate"=>$info->getStartDate(),
        "endDate"=>$info->getEndDate(),
        "courseName"=> $name
    ];
}
$postJSON = json_encode($result);
echo $postJSON;
?>
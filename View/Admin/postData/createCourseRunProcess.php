<?php 

session_start();
// var_dump($_SESSION);
require_once "../../../Class/autoload.php";
var_dump($_POST);
if($_POST){
    $sDateList = explode("-", $_POST['sDate']);
    $eDateList = explode("-", $_POST['eDate']);
    $_POST['sDate'] = $sDateList[2]."-".$sDateList[0]."-".$sDateList[1];
    $_POST['eDate'] = $eDateList[2]."-".$eDateList[0]."-".$eDateList[1];
    $courseRun = new CourseRun($_POST['coursecode'], $_POST['courseRunID'], intval($_POST['capacity']), $_POST['sDate'],$_POST['eDate']);
    $courseRunDAO = new CourseRunDAO();
    $courseRunDAO->addCourseRun($courseRun);
}
header("Location:./../ManageClass.html");
exit();
?>
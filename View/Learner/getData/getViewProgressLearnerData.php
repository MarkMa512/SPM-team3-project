<?php
session_start();
require_once "../../../Class/autoload.php";


$learnerDAO = new LearnerDAO();
$classes = $learnerDAO->getAllCourseRun($_SESSION['userID']);
// var_dump($classes);
$postJSON = json_encode($classes);
echo $postJSON;
?>
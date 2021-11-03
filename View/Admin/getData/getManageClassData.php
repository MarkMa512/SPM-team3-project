<?php

use phpDocumentor\Reflection\DocBlock\Tags\Var_;

session_start();
  require_once "../../../Class/autoload.php";
  
  // $_SESSION["user"] = $empDao->getAll();
  $courseDao = new CourseDAO();
  // var_dump($courseDao-> getAllCourse())
  $courseDao = new CourseDAO();
  $courses = $courseDao->getAllCourse();
  
  $result = [];
  // var_dump($courses);
  foreach ($courses as $course) {
    $courseCode = $course['Course_Code'];
    $courseName = $course['Course_Name'];
    $badgeName = $course['Bagde_Name'];
    $result[] = ["CourseCode"=>$courseCode, "CourseName"=>$courseName, "BadgeName"=>$badgeName];
  }
  $postJSON = json_encode($result);
  
  echo $postJSON;
?>


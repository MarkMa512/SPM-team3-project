<?php 
  session_start();
  require_once "../../Class/autoload.php";
  
  // $_SESSION["user"] = $empDao->getAll();
  $courseDao = new CourseDAO();
  // var_dump($courseDao-> getAllCourse())
  $courseDao = new CourseDAO();
  $courses = $courseDao->getAllCourse();
  
  $result = [];

  foreach ($courses as $course) {
    $courseCode = $course->getCourseCode();
    $courseName = $course->getCourseName();
    $badgeName = $course->getBadgeName();
    $result[] = ["CourseCode"=>$courseCode, "CourseName"=>$courseName, "BadgeName"=>$badgeName];
  }
  $postJSON = json_encode($result);
  echo $postJSON;
?>


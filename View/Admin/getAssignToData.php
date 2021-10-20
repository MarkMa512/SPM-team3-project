<?php
  require_once "../../Class/autoload.php";
  session_start();
  $courseRunDAO = new CourseRunDAO();
  // var_dump($empDAO->getAllInstructors());
  $courseRuns = $courseRunDAO->displayAllCourseRun();

  $result = [];
  foreach ($courseRuns as $courseRun) {
    $result[] = ["CourseID"=>$courseRun[0], "CourseRunID"=>$courseRun[2], "CourseName"=>$courseRun[1], "StartDate"=>$courseRun[4], "AvaiableSlots"=>$courseRun[3], "HRID"=>$_SESSION["user"]->getEmpID()];
    }
  $postJSON = json_encode($result);
  echo $postJSON;



          // foreach ($courseRuns as $courseRun){
          //   // remove section <td>Section 1</td>
          //   echo "
            
          //   ";
          // }
?>
            
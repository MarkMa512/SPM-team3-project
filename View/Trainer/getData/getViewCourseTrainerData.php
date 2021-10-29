
  <?php
          require_once "../../../Class/autoload.php";
          session_start();
          $trainerDAO = new TrainerDAO();
          // var_dump($empDAO->getAllInstructors());
          $classes = $trainerDAO->getClassesByID($_SESSION["user"]->getEmpID());
          $result = [];
          foreach ($classes as $class) {
            $result[] = ["CourseName"=>$class[1], "CourseCode"=>$class[0]->getCourseCode(), "CourseRunID"=>$class[0]->getCourseRunID()];
          }
          // var_dump($result);
          $postJSON = json_encode($result);
          echo $postJSON;
        ?>

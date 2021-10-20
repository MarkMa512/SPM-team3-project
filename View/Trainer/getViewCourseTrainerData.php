
  <?php
          require_once "../../Class/autoload.php";
          session_start();
          $trainerDAO = new TrainerDAO();
          // var_dump($empDAO->getAllInstructors());
          $classes = $trainerDAO->getClassesByID($_SESSION["user"]->getEmpID());
          var_dump($classes);
          $result = [];
          foreach ($classes as $class) {
            $result[] = ["CourseName"=>$class[1], "CourseCode"=>$class[0]->getCourseCode()];
          }
          $postJSON = json_encode($result);
          echo $postJSON;
        ?>

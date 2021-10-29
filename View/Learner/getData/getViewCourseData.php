
    <?php 
      session_start();
      require_once "../../../Class/autoload.php";


      $learnerDAO = new LearnerDAO();
      // var_dump($_SESSION);
      // // $empID = $_SESSION["user"]->getEmpType();
      // $crrUser = $_SESSION["user"];
      // $crrUser->getEmpType();
      // var_dump($crrUser);
      $classes = $learnerDAO->getClassesByID($_SESSION['userID']);
      // var_dump($classes);

      $result = [];
      foreach ($classes as $class) {
        $result[] = ["CourseName"=>$class[1], "CourseCode"=>$class[0]->getCourseCode()];
      }
      $postJSON = json_encode($result);
      echo $postJSON;
    ?>

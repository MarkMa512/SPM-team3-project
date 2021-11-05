
    <?php 
      session_start();
      require_once "../../../Class/autoload.php";


      $learnerDAO = new LearnerDAO();
      // var_dump($_SESSION);
      // // $empID = $_SESSION["user"]->getEmpType();
      // $crrUser = $_SESSION["user"];
      // $crrUser->getEmpType();
      // var_dump($learnerDAO->getClassesByID(2001));

      $classes = $learnerDAO->getClassesByID($_SESSION['userID']);
      // var_dump($classes);
      $courseRunDAO = new CourseRunDAO();
      $result = [];
      foreach ($classes as $class) {
        $instructorID = $courseRunDAO->getTrainerID($class[0]->getCourseCode(), $class[0]->getCourseRunID());
        $result[] = [
          "CourseName"=>$class[1], 
          "CourseCode"=>$class[0]->getCourseCode(), 
          "CourseRunID"=>$class[0]->getCourseRunID(),
          "trainerID" =>$instructorID];
      }
      $postJSON = json_encode($result);
      echo $postJSON;
    ?>

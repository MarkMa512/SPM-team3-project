
    <?php 
      session_start();
      require_once "../../../Class/autoload.php";


      $sectionDAO = new SectionDAO();
      // var_dump($_SESSION);
      // $empID = $_SESSION["user"]->getEmpType();
      // $crrUser = $_SESSION["user"];
      // $crrUser->getEmpType();
      // var_dump($crrUser);

      // var_dump($_SESSION);
      if(isset($_SESSION["getViewCourse"])){
        $classes = $sectionDAO->getAllSection($_SESSION["getViewCourse"][0],$_SESSION["getViewCourse"][1]);
      }else{
        $classes = $sectionDAO->getAllSection("SR101","1");
      }
      

      $result = [];
      foreach ($classes as $class) {
        $result[] = ["sectionID"=>$class->getSectionID(), "sectionName"=>$class->getSectionName(), "courseCode"=>$class->getCourseCode(), "courseRunID"=>$class->getCourseRunID()];
      }
      $postJSON = json_encode($result);
      echo $postJSON;
    ?>

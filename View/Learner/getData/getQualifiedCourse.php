
    <?php 
    session_start();
    require_once "../../../Class/autoload.php";
    $learnerDAO = new LearnerDAO();
    $classes = $learnerDAO->getQualifiedCourse($_SESSION['userID']);

    $result = [];
    foreach ($classes as $class) {
    $result[] = ["CourseName"=>$class[1]->getCourseName(), 
    "CourseCode"=>$class[0]->getCourseCode()];
    }
    $postJSON = json_encode($result);
    echo $postJSON;

    ?>

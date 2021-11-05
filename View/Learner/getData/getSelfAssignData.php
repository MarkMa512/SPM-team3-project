
    <?php 
    session_start();
    require_once "../../../Class/autoload.php";
    // $learnerDAO = new LearnerDAO();
    // $classes = $learnerDAO->getQualifiedCourse($_SESSION['userID']);

    // $result = [];
    // foreach ($classes as $class) {
    // $result[] = ["CourseName"=>$class[1]->getCourseName(), 
    // "CourseCode"=>$class[0]->getCourseCode()];
    // }
    // $postJSON = json_encode($result);
    // echo $postJSON;
        // var_dump($_SESSION["userID"]);
        $learnerDAO = new LearnerDAO();
        $attendedCourse = $learnerDAO->getAllAttendCourseByUserId($_SESSION["userID"]);
        $noAttendedCourse = $learnerDAO->getAllNotAttendCourseByUserId($_SESSION["userID"]);
        // var_dump($attendedCourse);
        // var_dump($noAttendedCourse);
        $courseDAO = new CourseDAO();
        $self_assign_course = [];
        foreach($noAttendedCourse as $course){
            $prerequisite = $courseDAO->getPrerequisite($course);
            // var_dump($prerequisite);
            if(sizeof($prerequisite) == 0){
                $self_assign_course[] = $course;
            }else{
                $allow = true;
                foreach($prerequisite as $eachCourse){
                    if(!in_array($eachCourse, $attendedCourse)){
                        $allow = false;
                        break;
                    }
                }if($allow){
                    $self_assign_course[] = $course;
                }
            }
        }
        // var_dump($self_assign_course);
        
        $result = [];
        $courseRunDao = new CourseRunDAO();

        foreach($self_assign_course as $course){
            // var_dump($course);
            $name = $courseDAO->getCourseByID($course)->getCourseName();
            foreach($courseRunDao->getCourseRun($course) as $courseRun){
                $result[] = [
                    "CourseName"=>$name,
                    "CourseRunID"=>$courseRun->getCourseRunID(),
                    "CourseID"=>$courseRun->getCourseCode(),
                    "StartTime"=>$courseRun->getStartDate()
                ];
            }
        }
        // var_dump($result);
        $postJSON = json_encode($result);
        echo $postJSON;
    ?>

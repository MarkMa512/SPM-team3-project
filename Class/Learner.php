<?php 

require_once 'autoload.php'; 

class Learner extends Engineer{

    function viewCourseProgress($courseCode, $courseRunID){
        // input: $courseCode, $CourseRunID
        // output: the Progress of a particular Course
        $learnerDAO = new LearnerDAO(); 
        $progress = $learnerDAO->getProgressByQuizPassed($this->Employee_ID,$courseCode, $courseRunID); 
        return $progress; 
    }

    function viewMaterial($courseCode, $courseRunID, $sectionID){
        $learnerDAO = new LearnerDAO(); 
        // $learnerDAO =
    }

    function messageTrainer($courseCode){
        $crrCourse = $this->getCourseClass($courseCode);
        
        // message function 
        
    }



    function getCourseClass($courseID){
        $courseRunID = "";
        $startDate = "";
        $endDate = "";
        $sessionList = [];
        // materials ?? datatype how to store?
        $trainer = "";
        $trainee = [];
        // return new Course($courseCode, $courseTitle, $prerequisite, $courseRunList);


    }

    


}

?>

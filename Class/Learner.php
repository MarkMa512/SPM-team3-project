<?php 

class Learner extends Engineer{

    function viewCourseProgress($courseCode, $courseRunID){
        // need to use sql to get progress (sql + fornt end)
        
            
    }

    function viewMaterial($courseCode, $courseRunID){
        // need to use sql (sql + fornt end)
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

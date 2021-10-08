<?php 

class Learner extends Engineer{

    function viewCourseProgress($courseID){
        // need to use sql to get progress 
    }

    function viewMaterial($courseID){
        // need to use sql
    }

    function messageTrainer($courseID){
        $crrCourse = $this->getCourseClass($courseID);
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
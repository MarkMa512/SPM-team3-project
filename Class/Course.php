<?php 
class Course{
    private $courseCode; //IS216 => edit 
    private $prerequisiteList = [];
    private $courseName;
    private $courseRunList = [];

    

    // function __construct($courseCode, $courseName, $prerequisite, $courseRunList=[]){
    //     $this->courseCode = $courseCode;
    //     $this->courseName = $courseName;
    //     $this->prerequisite = $prerequisite;
    //     $this->courseRunList= $courseRunList;
    //     // insert statement join statement; 
    // }

    function __construct($courseCode, $courseName, $prerequisiteList =[], $courseRunList=[]){
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->prerequisite = $prerequisiteList;
        $this->courseRunList= $courseRunList;
        // insert statement join statement 

    }

    function createCourseRun($courseRunID, $startDate, $endDate, $capacity){
        array_push($this->courseRunList,new CourseRun($this->courseCode,$courseRunID, $capacity, $startDate, $endDate));

    }

    function addPrerequisite($prerequisite){
        array_push($this->prerequisiteList,$prerequisite);
        // SQL statement insert statement 

    }


    function getCourseCode(){
        return $this->courseCode;
    }
    function getPrerequisiteList(){
        return $this->coursprerequisiteListe;
    }
    function getCourseName(){
        return $this->courseName;
    }
    function getCourseRunList(){
        return $this->courseRunList;
    }


    // please use try and catch method, if success then you run e.g $this->courseID = $courseID; and return true 
    function setCourseID($courseID){
        // update 
        
        $this->courseID = $courseID;
    }
    function setPrerequisiteList($coursprerequisiteList){
        // update 
        $this->coursprerequisiteList = $coursprerequisiteList;
    }
    function setCourseName($courseName){
        // update use $this->getCourseCode() method
        
        $this->courseName = $courseName;
    }
    function setCourseRunList($courseRunList){
        // update 
        $this->courseRunList = $courseRunList;
    }

    // function updatestatement($updatePart, $para){
    //     if($updatePart == 1){
    //         return $this->setPrerequisiteList($para);
    //     }else if($updatePart == 2){
    //         return $this->setCourseName($para);
    //     }
    // }

    

    

}

?>
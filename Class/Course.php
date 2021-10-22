<?php 
class Course{
    private $courseCode; //IS216 => edit 
    private $coursprerequisiteList = [];
    private $courseName;
    private $badgeName;
    private $courseRunList = [];

    

    // function __construct($courseCode, $courseName, $prerequisite, $courseRunList=[]){
    //     $this->courseCode = $courseCode;
    //     $this->courseName = $courseName;
    //     $this->prerequisite = $prerequisite;
    //     $this->courseRunList= $courseRunList;
    //     // insert statement join statement; 
    // }

    function __construct($courseCode, $courseName, $badgeName, $prerequisiteList =[], $courseRunList=[]){
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->coursprerequisiteList = $prerequisiteList;
        $this->courseRunList= $courseRunList;
        $this->badgeName = $badgeName;
        // insert statement join statement 

    }

    function createCourseRun($courseRunID, $startDate, $endDate, $capacity){
        array_push($this->courseRunList,new CourseRun($this->courseCode,$courseRunID, $capacity, $startDate, $endDate));

    }

    function addPrerequisite($prerequisite){
        array_push($this->coursprerequisiteList,$prerequisite);
        // SQL statement insert statement 

    }


    function getCourseCode(){
        return $this->courseCode;
    }
    function getPrerequisiteList(){
        return $this->coursprerequisiteList;
    }
    function getCourseName(){
        return $this->courseName;
    }
    function getCourseRunList(){
        return $this->courseRunList;
    }
    function getBadgeName(){
        return $this->badgeName;
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
    function setBadgeName($badgeName){
        $this->badgeName = $badgeName;
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
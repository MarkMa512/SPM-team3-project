<?php 
require_once "autoload.php"; 

class Course{
    private $courseCode; //IS216 => edit 
    private $coursprerequisiteList = [];
    private $courseName;
    private $badgeName;
    private $courseRunList = [];
    private $courseStatus = TRUE; 

    /**
     * Get the value of courseCode
     */ 
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Get the value of coursprerequisiteList
     */ 
    public function getCoursprerequisiteList()
    {
        return $this->coursprerequisiteList;
    }

    /**
     * Get the value of courseName
     */ 
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * Get the value of badgeName
     */ 
    public function getBadgeName()
    {
        return $this->badgeName;
    }

    /**
     * Get the value of courseRunList
     */ 
    public function getCourseRunList()
    {
        return $this->courseRunList;
    }

    /**
     * Get the value of courseStatus
     */ 
    public function getCourseStatus()
    {
        return $this->courseStatus;
    }


    // please use try and catch method, if success then you run e.g $this->courseID = $courseID; and return true 
    // roger that. will implement defensive programming here. 
    function setCourseCode($courseID){
        if(strlen($courseID)!= 5 || is_string($courseID) == FALSE){ 
            # check if the input course code is in correct format
            throw new Exception ("Course code must be a 5-digit Alpha-numeric string"); 
        }
        else{
            $this->courseID = $courseID;
            return TRUE; 
        }
    }
    function setPrerequisiteList($coursprerequisiteList){
        if(is_array($coursprerequisiteList) == FALSE){
            throw new Exception ("Course Prerequisite List must be an array"); 
        }
        else{
            $this->coursprerequisiteList = $coursprerequisiteList;
            return TRUE; 
        }
    }

    function setCourseName($courseName){
        if(is_string($courseName) == FALSE){
            throw new Exception ("Course Name must be a string"); 
        }
        else{
            $this->courseName = $courseName;
            return TRUE; 
        }
        
    }
    function setCourseRunList($courseRunList){
        if(is_array($courseRunList) == FALSE){
            throw new Exception ("Course Run List must be an array"); 
        }
        else{
            $this->courseRunList = $courseRunList;
            return TRUE; 
        }
    }

    function setBadgeName($badgeName){
        if(is_string($badgeName) == FALSE){
            throw new Exception ("Course code must be a string"); 
        }
        else{
            $this->badgeName = $badgeName;
            return TRUE; 
        }
    }
    
    function setCourseStatus($courseStatus){
        if(is_bool($courseStatus) == FALSE){
            throw new Exception ("Course status must be boolean"); 
        }
        else{
            $this->courseStatus = $courseStatus;
            return TRUE; 
        }
    }

    function obtainPrerequisiteList(){
        $courseDAO = new CourseDAO(); 
        // 
    }

    function obtainCourseRunList(){

    }

    function __construct($courseCode, $courseName, $badgeName, $prerequisiteList =[], $courseRunList=[], $courseStatus = TRUE){
        $this->setCourseCode($courseCode); 
        $this->setCourseName($courseName);
        $this->setBadgeName($badgeName);
        $this->setPrerequisiteList($prerequisiteList); 
        $this->setCourseRunList($courseRunList); 
        $this->setCourseStatus($courseStatus); 
    }


    function createCourseRun($courseRunID, $startDate, $endDate, $capacity){
        array_push($this->courseRunList,new CourseRun($this->courseCode,$courseRunID, $capacity, $startDate, $endDate));
    }


    function addPrerequisite($prerequisite){
        array_push($this->coursprerequisiteList,$prerequisite);
    }
}
?>
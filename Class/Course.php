<?php 
class Course{
    private $courseCode;
    private $prerequisiteList = [];
    private $courseTitle;
    private $courseRunList = [];

    function __construct($courseCode, $courseTitle, $prerequisite, $courseRunList=[]){
        $this->courseCode = $courseCode;
        $this->courseTitle = $courseTitle;
        $this->prerequisite = $prerequisite;
        // select statement 
    }

    function createCourseRun($courseRunID, $startDate, $endDate){
        array_push($this->courseRunList,new CourseRun($courseRunID, $startDate, $endDate));

    }

    function addPrerequisite($prerequisite){
        array_push($this->prerequisiteList,$prerequisite);
    }

    function getCourseCode(){
        return $this->courseCode;
    }
    function getPrerequisiteList(){
        return $this->coursprerequisiteListe;
    }
    function getCourseTitle(){
        return $this->courseTitle;
    }
    function getCourseRunList(){
        return $this->courseRunList;
    }


    function setCourseID($courseID){
        $this->courseID = $courseID;
    }
    function setPrerequisiteList($coursprerequisiteList){
        $this->coursprerequisiteList = $coursprerequisiteList;
    }
    function setCourseTitle($courseTitle){
        $this->courseTitle = $courseTitle;
    }
    function setCourseRunList($courseRunList){
        $this->courseRunList = $courseRunList;
    }

}

?>
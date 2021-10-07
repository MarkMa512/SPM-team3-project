<?php 
class Course{
    private $courseCode;
    private $prerequisiteList = [];
    private $courseTitle;
    private $courseRunList = [];

    function __construct($courseCode, $courseTitle, $prerequisite){
        $this->courseCode = $courseCode;
        $this->courseTitle = $courseTitle;
        $this->prerequisite = $prerequisite;
        // select statement 
    }

    function createCourseRun($startDate, $endDate){
        $this->courseRunList.append(new CourseRun($startDate, $endDate));
    }

    function addPrerequisite($prerequisite){
        $this->prerequisiteList.append($prerequisite);
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
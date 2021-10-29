<?php 

class CourseRun{
    private $courseCode;
    private $courseRunID;
    private $capacity;
    private $startDate;
    private $endDate;
    private $sectionList = [];
    
    // materials ?? datatype how to store?

    private $trainer = "";

    // store trainee ID => empID
    private $trainee = [];


    

    function __construct($courseCode, $courseRunID, $capacity, $startDate, $endDate, $trainer=""){
        // $courseCode, $courseRunID as the primary key 
        $this->courseCode = $courseCode;
        $this->trainer = $trainer; //if trainer return "" if not exist
        $this->trainee = [];
        $this->courseRunID = $courseRunID;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->$capacity = $capacity;
        // insert statement to check if $courseCode and $courseRunID (PKs) exisited 

    }
    // function courseRunInsertDB(){
    //     // insert courseRun to database 

    // }

    // return method by object refers back to Course.php class, pls rmb to use $courseCode, $courseRunID
    function getCourseRunID(){
        
        return $this->courseRunID;
    }
    function getStartDate(){
        return $this->startDate;
    }
    function getEndDate(){
        return $this->endDate;
    }
    function getCourseCode(){
        return $this->courseCode;
    }
    function getTrainer(){
        return $this->trainer;
    }
    function getTrainee() {
        return $this->trainee;
    }
    function getSectionList(){
        return $this->sectionList;
    }

    // return method by object refers back to Course.php class set
    // since it is part of PK, and no recommend to edit it 
    function setCourseRunID($courseRunID){
        $this->courseRunID = $courseRunID;
    }
    function setStartDate(){
        return $this->startDate;
    }
    function setEndDate(){
        return $this->endDate;
    }
    function setCourseCode($courseCode){
        $this->courseCode = $courseCode;
    }
    // since it is part of PK, and no recommend to edit it 
    function setTrainer($trainerID){
        $this->trainer = $trainerID;
    }
    function setTrainee($trainee) {
        $this->trainee = $trainee;
    }
    function setSectionList(){
        return $this->sectionList;
    }

    //insert statement
    function addTrainee($traineeID){
        $this->trainee[] = $traineeID;
    }


    function createSection($sectionNum, $sectionName){
        array_push($this->sectionList,new Section($this->courseCode, $this->courseRunID, $sectionNum, $sectionName));
        // No need sql statement 
    }
    
    function removeTrainee($traineeID) {
        $index = array_search($traineeID, $this->trainee);
        if($index == -1){
            return false;
        }
        unset($this->trainee[$index]);
        return true;
    }

    

    function uploadCourseRunMaterials(){
        // See the materials, return true or false and using try can catch 

    }

}

?>
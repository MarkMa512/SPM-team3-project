<?php 
class CourseRun{
    private courseRunID;
    private startDate;
    private endDate;
    private sessionList = [];
    // materials ?? datatype how to store?


    public function __construct(startDate, endDate){
        $this->startDate = startDate;
        $this->endDate = endDate;
    }

    public function getStartDate(){
        return $this->startDate;
    }

    public function getEndDate(){
        return $this->endDate;
    }

    public function getID(){
        return $this->courseRunID;
    }

    public function createSession(sectionNum){
        $this->sessionList.append(new Session(sectionNum));
    }
    
    function uploadCourseRunMaterials(){
        // See the materials 
        
    }

}

?>
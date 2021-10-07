<?php 
class CourseRun{
    private courseRunID;
    private startDate;
    private endDate;
    private sessionList = [];
    // materials ?? datatype how to store?
    private trainer;
    private trainee = [];


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
    

    public function setTrainer(trainerID){
        $this->trainer = trainerID;
    }
    public function getTrainer(){
        return $this->getTrainer;
    }

    public function addTrainee(traineeID){
        $this->trainee.append(traineeID);
    }

    public function removeTrainee(traineeID) {
        index = array_search(traineeID, $this->trainee);
        if(index == -1){
            return false;
        }
        $this->trainee.pop(index);
        return true;
    }

    

    function uploadCourseRunMaterials(){
        // See the materials 

    }

}

?>
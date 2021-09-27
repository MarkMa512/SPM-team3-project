<?php 
class HR{
    private $name;
    private $ID;
    private $designation;


    public function __construct($name, $ID, $designation) {
        $this->name = $name;
        $this->ID = $ID;
        $this->designation = $designation;
    }

    public function assignLearnerClass($learner, $section) {
        //assign the learner into a specific section
        $section->addLearner($learner);
    }

    public function assignTrainerClass($trainer, $section) {
        $section->addTrainer($trainer);
    }

    public function displayEngineers(){
        
    }

    public function displayClassWithSessions(){
        
    }
}

?>
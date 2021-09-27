<?php
class Section{
    private $sectionName;
    private $sectionID; 
    private $trainer = [];
    private $learners = []; 
    private $quiz = []; 
    public function __construct( $sectionName, $sectionID){
        $this->sectionName = $sectionName;
        $this->sectionID = $sectionID;
        $this->trainer = [];
        $this->learners = [];
        $this->quiz = [];
    }

    public function createQuiz($quizName, $quizID){
        $this->quiz[] = new Quiz($quizName, $quizID);
    }


    public function addLearners($learner){
        $this->learners[] = $learner;
    }
    
    public function addTrainer($trainer){
        //assumption: more trainer for a section 
        $this->learners[] = $trainer;
    }
}

?>
<?php
class Quiz{
    private $quizName; //
    private $quizID; //
    private $questionList = []; //
    private $answerList = []; //
    public function __construct($quizName, $quizID){
        $this->quizName = $quizName;
        $this->quizID = $quizID;
        $this->questionList = [];
        $this->answerList = [];
    }

    public function createQuiz(){

    }
    public function createAnswer(){
        
    }
}

?>
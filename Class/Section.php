<?php 
class Section{
    private $sectionNum;
    private $quizList = [];
    function __construct($sectionNum){
        $this->sectionNum = $sectionNum;
    }
    function createQuiz($quizID, $quizType, $quizQuestion, $quizAnswer){
        $this->quizList.append(new Quiz($quizID, $quizType, $quizQuestion, $quizAnswer));
    }

    function autoGetQuizResult($quizID, $answer){
        $result = [];
        // 
    }

}

?>
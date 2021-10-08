<?php 
class Section{
    private $sectionNum;
    private $quizList = [];
    function __construct($sectionNum){
        $this->sectionNum = $sectionNum;
    }
    function createQuiz($quizID, $quizType, $quizQuestion, $quizAnswer){
        $this->quizList[]=new Quiz($quizID, $quizType, $quizQuestion, $quizAnswer);
    }

    

    function autoGetQuizResult($quizID, $answer){
        // return $answer with its quiz ID
        $result = [];
        for($i=0; $i< sizeof($answer); $i++){
            $crrQuiz = $this->getQuizClass($quizID);
            $result[]=$crrQuiz->autoGrade($answer[$i]);
        }
        // return % of correction as list 

        // you can return anything you wanna return here like % of overall 
        return $result;
    }

    function getQuizClass($quizID){
        // return the quiz class object; select sql statement to get from quiz class 
        $quizID = ""; 
        $quizType ="";
        $quizQuestion =""; 
        $quizAnswer = "";

        return new Quiz($quizID, $quizType, $quizQuestion, $quizAnswer);
    }

}

?>
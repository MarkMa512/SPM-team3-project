<?php 
class Quiz{
    //private $quizID;
    private $quizTitle;
    private $quizQuestionList;
    private $quizAnswerList;

    function __construct($quizTitle, $quizQuestionList, $quizAnswerList){
        //$this->quizID = $quizID;
        $this->quizTitle = $quizTitle;
        $this->quizQuestionList = $quizQuestionList;
        $this->quizAnswerList = $quizAnswerList;
    }

    function autoGrade($responseList){
        $totalQuestions = sizeof($this->quizAnswerList);
        $correctQUestions = 0;
        foreach($this->quizAnswerList as $quizAnswer){
            foreach($responseList as $responseAnswer){
                if($quizAnswer['qnNumber'] == $responseAnswer['qnNumber']){
                    if($quizAnswer['answer'] == $responseAnswer['answer']){
                        $correctQUestions ++;
                    }
                    break;
                }
            }
        }
        return [$totalQuestions, $correctQUestions];
        #echo $totalQuestions;
        #echo $correctQUestions;
    }

    /* function getQuizID(){
        return $this->quizID;
    } */
    
    function getQuizTitle(){
        return $this->quizTitle;
    }

    function getQuizQuestionList(){
        return $this->quizQuestionList;
    }

    function getQuizAnswerList(){
        return $this->quizAnswerList;
    }

}

?>


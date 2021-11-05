<?php 
class Quiz{
    private $courseCode;
    private $courserunID;
    private $sectionID;
    private $quizTitle;
    private $quizQuestionList;
    private $quizAnswerList;

    function __construct($courseCode, $courserunID, $sectionID, $quizTitle, $quizQuestionList, $quizAnswerList){
        $this->courseCode = $courseCode;
        $this->courserunID = $courserunID;
        $this->sectionID = $sectionID;
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

    function getCourseCode(){
        return $this->courseCode;
    }
    
    function getCourseRunID(){
        return $this->courserunID;
    }

    function getSectionID(){
        return $this->sectionID;
    }
    
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


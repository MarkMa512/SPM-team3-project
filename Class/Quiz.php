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
        $answerListArray = json_decode($this->quizAnswerList, true);
        $totalQuestions = sizeof($answerListArray);
        $correctQuestions = 0;
        foreach($answerListArray as $quizAnswer){
            foreach($responseList as $responseAnswer){
                if($quizAnswer['qnNumber'] == $responseAnswer['qnNumber']){
                    if($quizAnswer['answer'] == $responseAnswer['answer']){
                        $correctQuestions ++;
                    }
                    break;
                }
            }
        }
        $score = round((($correctQuestions / $totalQuestions) * 100), 2);

        return $score;
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


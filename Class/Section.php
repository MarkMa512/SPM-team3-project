<?php 
class Section{
    private $courseCode;
    private $courseRunID;
    private $sectionID;
    private $sectionName; 
    private $materialList; //????
    private $quizList = [];
    function __construct($courseCode, $courseRunID, $sectionID, $sectionName){
        $this->courseCode = $courseCode;
        $this->courseRunID = $courseRunID;
        $this->sectionID = $sectionID;
        $this->sectionName = $sectionName; 
        $this->quizList = [];

        // sql select for quiz List 
    }
    function createQuiz($quizID, $quizType, $quizQuestion, $quizAnswer){
        $this->quizList[]=new Quiz($quizID, $quizType, $quizQuestion, $quizAnswer);

    }

    function sectionInsertDB(){
        // insert section to database 

    }
    

    function autoGetQuizResult($quizID, $answer){
        //answer is list and $quizID is also list
        // return $answer with its quiz ID
        $result = [];
        for($i=0; $i< sizeof($answer); $i++){
            $crrQuiz = $this->getQuizClass($quizID);
            $result[]=$crrQuiz->autoGrade($answer[$i]);
        }
        // return % of correction as list 

        // you can return anything you wanna return here like % of overall 


        // sql insert quiz records 
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

    function uploadMaterials($material){
        //???
    }
}

?>
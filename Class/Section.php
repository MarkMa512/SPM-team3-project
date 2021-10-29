<?php 
class Section{
    private $courseCode;
    private $courseRunID;
    private $sectionID;
    private $sectionName; 
    private $materialList; //????
    private $quizList = [];
    private $isGRaded = FALSE; // to indicate if the quiz is graded or not
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

    // Ningzhi: Refer to DAO classes 
    // function sectionInsertDB(){
    //     // insert section to database 

    // }
    
    // Getter: 
    /**
     * Get the value of courseCode
     */ 
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Get the value of courseRunID
     */ 
    public function getCourseRunID()
    {
        return $this->courseRunID;
    }

    /**
     * Get the value of sectionID
     */ 
    public function getSectionID()
    {
        return $this->sectionID;
    }

    /**
     * Get the value of sectionName
     */ 
    public function getSectionName()
    {
        return $this->sectionName;
    }

    /**
     * Get the value of materialList
     */ 
    public function getMaterialList()
    {
        return $this->materialList;
    }

    /**
     * Get the value of quizList
     */ 
    public function getQuizList()
    {
        return $this->quizList;
    }

    /**
     * Get the value of isGRaded
     */ 
    public function getIsGRaded()
    {
        return $this->isGRaded;
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
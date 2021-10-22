<?php 
class Quiz{
    private $quizID;
    // assumption true and false: type is 0; multiple answer will be 1;
    private $quizType;
    private $quizQuestion;
    //quizAnswer will be array if mutiple answer, it will be 
    private $quizAnswer; //list
    private $grade;
    

    function __construct($quizID, $quizType, $quizQuestion, $quizAnswer){
        $this->quizID = $quizID;
        $this->quizType = $quizType;
        $this->quizQuestion = $quizQuestion;
        $this->quizAnswer = $quizAnswer;
    }

    function quizInsertDB(){
        // insert quiz to database 

    }

    function autoGrade($answer){
        // more than expected input rewards 0 
        if(sizeof($answer) > sizeof($this->quizAnswer)){} {
            return 0;
        }
        if($this->quizType == 0){
            if($answer[0] == $this->quizAnswer[0]){
                return 1;
            }return 0;
        }else{
            $total_question = sizeof($this->quizAnswer);
            $correct = 0;
            for($i=0; $i<sizeof($this->answer); $i++){
                if(in_array($answer[$i], $this->quizAnswer)){
                    $correct++;
                }
            }
            return $correct/$total_question;
        }
    }

    

}

?>


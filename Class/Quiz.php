<?php 
class Quiz{
    private quizID;
    // assumption true and false: type is 0; multiple answer will be 1;
    private quizType;
    private quizQuestion;
    //quizAnswer will be array if mutiple answer, it will be 
    private quizAnswer;
    private grade;
    

    function __construct(quizID, quizType, quizQuestion, quizAnswer){
        $this->quizID = quizID;
        $this->quizType = quizType;
        $this->quizQuestion = quizQuestion;
        $this->quizAnswer = quizAnswer;
    }

    function autoGrade(answer){
        
        if($this->type == 0){
            if(answer == $this->answer[0]){
                return 1;
            }
        }else{
            total_question = $this->quizAnswer.length;;
            correct = 0;
            answers = [];
            for(i=0; i<answer.length; i++){
                if(in_array(answer[i], $this->quizAnswer)){
                    correct++;
                }
            }
            return correct/total_question;
        }return 0;
    }

}

?>
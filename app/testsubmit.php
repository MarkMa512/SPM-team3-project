<?php 

var_dump($_POST);
require_once "../Class/autoload.php";

#$array = array
/*if (isset($_POST['question1'])){
    #$test = array('qnName' => $_POST['question1']) ;
    $question1['qnNumber'] = 1;
    $question1['type'] = $_POST['question1Type'];
    $question1['qnText'] = $_POST['question1'];
    var_dump($question1);
    
} */

$questionArray = [];
$answerArray = [];

for($i = 1; $i <= 10; $i ++){

    if(isset($_POST['question' . $i])){
        $question = [];
        $answer = [];
        $optionArray = [];
        $question['qnNumber'] = $i;
        $question['type'] = $_POST['question' . $i . 'Type'];
        $question['qnText'] = $_POST['question' . $i];

        for($x = 1; $x <= 6; $x ++){
            if(isset($_POST['question'. $i . 'Opt' . $x])){
                $option = [];
                $option['id'] = 'q' . $i . '-' . $x;
                $option['value'] = $_POST['question'. $i . 'Opt' . $x];
                array_push($optionArray, $option);
            }
        }

        $question['options'] = $optionArray;
        $answer['qnNumber'] = $i;
        $answer['answer'] = $_POST['radio' . $i];

        array_push($questionArray, $question);
        array_push($answerArray, $answer);

    }
}

$quiz = new Quiz($_POST['quizTitle'], $questionArray, $answerArray);

echo $quiz->getQuizTitle();
var_dump($quiz->getQuizQuestionList()[1]);
var_dump($quiz->getQuizAnswerList());
#echo sizeof($quiz->getQuizAnswerList());
$response = [['qnNumber' => 1, 'answer' => '2'], ['qnNumber' => 2, 'answer' => '1']];
var_dump($quiz->autoGrade($response));

#var_dump($questionArray);
#var_dump($answerArray);
#{"qnName" : "Question 2","type" : "mcq", "option":[{"id": "q2-1", "value": "Option 1"}, {"id": "q2-2", "value": "Option 2"}, {"id": "q2-3", "value": "Option 3"}], "id" : "q2"},
?>
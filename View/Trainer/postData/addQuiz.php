<?php 
session_start();
var_dump($_POST);
var_dump($_GET);
require_once "../../../Class/autoload.php";
echo 'test';
$questionArray = [];
$answerArray = [];

try{
    
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
                    $option['optText'] = $_POST['question'. $i . 'Opt' . $x];
                    $option['value'] = $x;
                    array_push($optionArray, $option);
                }
            }

            $question['options'] = $optionArray;
            $answer['qnNumber'] = $i;
            if(isset($_POST['radio' . $i])){
                $answer['answer'] = $_POST['radio' . $i];
            }else{
                $answer['answer'] = $_POST['checkbox' . $i];
            }
            

            array_push($questionArray, $question);
            array_push($answerArray, $answer);

        }
    }
    
    #var_dump($answerArray);
    $quiz = new Quiz($_GET['coursecode'], $_GET['courserunid'], $_GET['sectionID'], $_POST['quizTitle'], $questionArray, $answerArray);
    #echo $quiz->getQuizID();
    $quizDAO = new QuizDAO;
    #echo ($quizDAO -> addQuiz($quiz));
    $quizDAO -> addQuiz($quiz);
    echo 'test';
}catch(PDOException $e){
    $_SESSION['error_msg'] = "PDO issues";
    #header("Location:../SectionListForQuiz.html");
    exit();
}
#header("#to edit");
header("Location:./../SectionListForQuiz.html");
exit();
?>
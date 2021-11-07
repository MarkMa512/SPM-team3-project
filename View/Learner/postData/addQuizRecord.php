<?php
require_once "../../../Class/autoload.php";
session_start();
var_dump($_GET);
var_dump($_POST);
var_dump($_SESSION);
echo $_SESSION['user']->getEmpID();

$responseArray = [];

for($i = 1; $i <= 10; $i ++){
    if(isset($_POST[$i])){
        $myResponse = [];
        $myResponse['qnNumber'] = $i;
        $myResponse['answer'] = $_POST[$i];
        array_push($responseArray, $myResponse);
    }
}

var_dump($responseArray);

try{
    $quizDAO = new QuizDAO;
    $quiz = $quizDAO->getQuiz($_GET['coursecode'], $_GET['courserunid'], $_GET['sectionID']);

    #var_dump($quiz);
}catch(PDOException $e){
    #$_SESSION['error_msg'] = "PDO issues";
    #header("Location:../SectionListForQuiz.html");
    echo $e;
    exit();
}

$myResult = $quiz->autoGrade($responseArray);
echo $myResult;

$quizDAO->addQuizRecord($_SESSION['user']->getEmpID(), $_GET['coursecode'], $_GET['courserunid'], $_GET['sectionID'], $responseArray, $myResult);

header("Location:./../LatestQuizResult.html?coursecode=" . $_GET['coursecode'] . '&courserunid=' . $_GET['courserunid'] . '&sectionID=' . $_GET['sectionID'] . '&learnerID=' . $_SESSION['user']->getEmpID());




?>
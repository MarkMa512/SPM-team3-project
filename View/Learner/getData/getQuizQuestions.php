<?php
require_once "../../../Class/autoload.php";
session_start();
$quizDAO = new QuizDAO();
$result = $quizDAO->getQuizQuestions($_GET['coursecode']);

$postJSON = json_encode($result);
echo $postJSON;


?>
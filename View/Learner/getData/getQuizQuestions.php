<?php
require_once "../../../Class/autoload.php";
session_start();
$quizDAO = new QuizDAO();
$result = $quizDAO->getQuizQuestions($_GET['sectionID']);

$postJSON = json_encode($result);
echo $postJSON;


?>
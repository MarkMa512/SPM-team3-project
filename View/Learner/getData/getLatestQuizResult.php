<?php
require_once "../../../Class/autoload.php";
session_start();
$quizDAO = new QuizDAO();
$result = $quizDAO->getLatestQuizResult($_GET['learnerID'], $_GET['coursecode'], $_GET['courserunid'], $_GET['sectionID']);

$postJSON = json_encode($result);
echo $postJSON


?>
<?php
session_start();
require_once "../../../Class/autoload.php";


$learnerDAO = new LearnerDAO();
$classes = $learnerDAO->getMaterialsById($_SESSION['userID']);
$postJSON = json_encode($classes);
echo $postJSON;
?>
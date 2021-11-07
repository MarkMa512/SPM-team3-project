<?php 
    session_start();
    require_once "../../../Class/autoload.php";

    var_dump($_SESSION);
    var_dump($_GET);
    $learnerDAO = new LearnerDAO();
    $learnerDAO->selfAssign($_SESSION["userID"], $_GET["courseID"], $_GET["courseRunID"] );



?>
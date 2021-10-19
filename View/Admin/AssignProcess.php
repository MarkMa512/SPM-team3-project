<?php
    
    require_once "../../Class/autoload.php";
    session_start();
    var_dump($_GET);
    var_dump($_SESSION);
    if($_GET && $_SESSION){
        
        $instructorID = $_GET["empID"];
        $courseID = $_GET["CourseID"];
        $courseRunID = $_GET["CourseRUNID"];
        $HRID = $_SESSION["user"]->getEmpID();
        echo $HRID;
        $courseRunDAO = new CourseRunDAO();
        $now = new DateTime();
        var_dump($now);
        var_dump([$HRID, $instructorID, $courseID, $courseRunID, ]);
        $courseRunDAO->assignTrainer($instructorID, $HRID, $courseID, $courseRunID, "2021-10-19 12:13:09.556438");
        
    }else{
        echo "NOLL";
    }


?>
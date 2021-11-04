<?php
    require_once "../../../Class/autoload.php";
    session_start();
    var_dump($_SESSION);
    $trainerDAO = new TrainerDAO();
    $record = $trainerDAO->getCourseRunByTrainerID($_SESSION["userID"]);
    $result = [];
    foreach($record as $r){
        $result[$r['Course_Code']."-".$r['Course_Name']][$r['Course_Run_ID']][$r['Section_ID']]['Quiz_Score'][] = $r['Quiz_Score'];
        $result[$r['Course_Code']."-".$r['Course_Name']][$r['Course_Run_ID']][$r['Section_ID']]['Attempt_Number'][] = $r['Attempt_Number'];
    }
    var_dump($result);
    $postJSON = json_encode($result);
    echo $postJSON;
?>